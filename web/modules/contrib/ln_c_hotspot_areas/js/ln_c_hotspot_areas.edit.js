'use strict';
(function($, Drupal) {
  Drupal.behaviors.imageHotspotsEdit = {
    attach: function(context, settings) {
      $('.image-hotspot-areas-wrapper:not(.init-edit)', context).each(function() {
        var $wrapper = $(this);
        // Main elements.
        var divs = {
          $wrapper: $wrapper,
          $imageWrapper: $wrapper.find('.image-wrapper'),
          $image: $wrapper.find('img'),
          $labelsWrapper: $wrapper.find('.labels'),
          $editForm: $wrapper.find('.edit-form-wrapper'),
          $imageJcrop: null,
          $jcropWrapper: null
        };
        // Main data.
        var data = {
          hotspotsTarget: {
            fieldName: this.dataset.fieldName,
            imageStyle: this.dataset.imageStyle,
            fid: this.dataset.fid,
            entityId: this.dataset.entityId,
            lang: this.dataset.lang
          },
          hotspots: settings.hotspot_areas[this.dataset.entityId][this.dataset.lang][this.dataset.fieldName][this.dataset.fid][this.dataset.imageStyle].hotspots || {}
        };
        // Editor state.
        var state = {
          currentLabel: null,
          currentButton: null,
          currentHid: null,
          jcropApi: null
        };

        // Initialization
        $wrapper.find('.add-button').click(function () {
          var $button = $(this);
          unselectButton();
          state.currentButton = $button;
          editAction($button);
        });

        $wrapper.find('select[name="shape"]').on('change', function() {
          if( $(this).val() == 'circle') $wrapper.find('.jcrop-holder').addClass('circle');
          else $wrapper.find('.jcrop-holder').removeClass('circle');
        });

        $wrapper.find('a.open-close-configuration').on('click', function() {
          $(this).siblings('.configuration-image-hotspot-areas-wrapper').toggle();
        });

        divs.$labelsWrapper.children().each(function () {
          addEditorsToLabel($(this));
        });
        initEditForm();
        initJcrop();
        $wrapper.addClass('.init-edit');

        // Add edit and remove buttons to label.
        function addEditorsToLabel($label) {
          var $edit = $('<div />', {
            class: 'action edit',
            html: Drupal.t('Edit'),
            title: Drupal.t('Edit this hotspot'),
            on: {
              click: function () {
                var $button = $(this);
                var $label = $button.parent().parent();
                unselectButton();
                state.currentButton = $button;
                $button.addClass('selected');
                editAction($label);
              }
            }
          });
          var $remove = $('<div />', {
            class: 'action remove',
            html: Drupal.t('Remove'),
            title: Drupal.t('Delete this hotspot'),
            on: {
              click: function () {
                unselectButton();
                state.currentButton = null;
                var $label = $(this).parent().parent();
                removeAction($label);
              }
            }
          });
          var $box = $('<div />', {
            class: 'label-editor',
            'data-hid': $label.data('hid')
          });
          $box.append($edit, $remove);
          $label.append($box);
        }

        // Action when user click on 'remove' button.
        function removeAction($label) {

          var r = confirm("Are you sure to remove this hotspot?");
          if (r == true) {

            var hid = $label.data('hid');
            var $button = $label.find('.remove');
            var $throbber = $('<div />', {
              class: 'ajax-progress-throbber',
              html: '<div class="throbber"></div>'
            });
            $button.after($throbber);
            $.post(drupalSettings.path.baseUrl + 'hotspot-areas/' + hid + '/delete', {}, function(responseData) {
              removeHotspotFromImage(hid);
              hideJcrop();
              hideEditForm();
              $label.fadeOut(100);
              setTimeout(function () {
                $label.remove();
              }, 100)
            })
                .fail(function(responseData) {
                  alert(responseData.responseText)
                })
                .always(function() {
                  $throbber.remove();
                });
          }
        }

        // Action when user click on 'edit' button.
        function editAction($label) {
          var hid = $label.data('hid') || -1;
          var hotspot_data = data.hotspots[hid] || {
              'title': '',
              'description': '',
              'link': '',
              'link_title': '',
              'shape': '',
              'mouse_behaviour': '',
            };
          var position = $label.position();
          var dimensions = {
            'width': $label.width(),
            height: $label.height()
          };

          state.currentHid = hid;
          state.currentLabel = $label;

          showJcrop();

          if (hotspot_data.x !== undefined) {
            state.jcropApi.setSelect([
              hotspot_data.x,
              hotspot_data.y,
              hotspot_data.x2,
              hotspot_data.y2
            ]);
          }
          else {
            state.jcropApi.release();
          }

          showEditForm(hotspot_data, position, dimensions);
        }

        // Calculates position of form and fills inputs.
        function showEditForm(hotspot_data, position, dimensions) {
          $('.edit-form-wrapper').hide(); // hide other forms
          divs.$editForm.css({
            top: divs.$imageWrapper.bottom + 10 + 'px',
            left: divs.$imageWrapper.left + 10 + 'px'
          });
          divs.$editForm.fadeIn(200);
          var ckeditor_id = divs.$editForm.find('textarea').attr('id');
          CKEDITOR.instances[ckeditor_id].setData(hotspot_data.description);
          divs.$editForm.find('input[name="title"]').val(hotspot_data.title);
          divs.$editForm.find('input[name="link"]').val(hotspot_data.link);
          divs.$editForm.find('input[name="link_title"]').val(hotspot_data.link_title);
          divs.$editForm.find('select[name="shape"]').val((hotspot_data.shape) ? hotspot_data.shape : 'square');
          divs.$editForm.find('select[name="mouse_behaviour"]').val((hotspot_data.mouse_behaviour) ? hotspot_data.mouse_behaviour : 'click');
          divs.$editForm.find('select[name="shape"]').trigger('change'); // force chnage to square or circle
        }

        // Hides edit form and clears messages.
        function hideEditForm() {
          divs.$editForm.fadeOut(200);
          divs.$editForm.find('.form-messages').html('');
        }

        // Action when form is closed or successfully submited.
        function closeFormAction() {
          hideJcrop();
          hideEditForm();
          unselectButton();
        }

        // Action when user click on 'Save' button in edit form.
        function saveFormAction() {
          var hid, hotspotNewData;
          var selection = state.jcropApi.tellSelect();
          if (selection.h <= 0) {
            divs.$editForm.find('.form-messages').html(Drupal.t('Please select an area on the image.'));
            divs.$editForm.find('.form-messages').focus();
            return false;
          }

          hid = state.currentHid;
          var ckeditor_id = divs.$editForm.find('textarea').attr('id');
          hotspotNewData = {
            title: divs.$editForm.find('input[name="title"]').val(),
            description: CKEDITOR.instances[ckeditor_id].getData(),
            description_format: divs.$editForm.find('textarea#' + ckeditor_id).attr('data-editor-active-text-format'),
            link: divs.$editForm.find('input[name="link"]').val(),
            link_title: divs.$editForm.find('input[name="link_title"]').val(),
            shape: divs.$editForm.find('select[name="shape"]').val(),
            mouse_behaviour: divs.$editForm.find('select[name="mouse_behaviour"]').val(),
            x: Math.round(selection.x),
            y: Math.round(selection.y),
            x2: Math.round(selection.x2),
            y2: Math.round(selection.y2)
          };

          var $throbber = $('<div />', {
            class: 'ajax-progress-throbber',
            html: '<div class="throbber"></div>'
          });

          if (hid !== -1) {
            if (equalData(data.hotspots[hid], hotspotNewData)) {
              closeFormAction();
              return false;
            }

            divs.$editForm.find('button').after($throbber);
            $.post(drupalSettings.path.baseUrl + 'hotspot-areas/' + hid + '/update', hotspotNewData, function(responseData) {
              hotspotNewData = responseData;
              var $labelTitle = state.currentLabel.find('.label-title').children();
              if (data.hotspots[hid].title !== hotspotNewData.title) {
                $labelTitle.html(hotspotNewData.title);
              }

              data.hotspots[hid] = hotspotNewData;
              hotspotNewData.hid =  responseData;
              closeFormAction();
              removeHotspotFromImage(hid);
              Drupal.behaviors.imageHotspotView.createHotspotBox(divs.$imageWrapper, hotspotNewData);
            })
              .fail(function (responseData) {
                if(responseData.responseJSON && responseData.responseJSON.error) {
                  divs.$editForm.find('.form-messages').text(responseData.responseJSON.error);
                }
              })
              .always(function () {
                $throbber.remove();
              });
          }
          else {
            hotspotNewData.image_style = data.hotspotsTarget.imageStyle;
            hotspotNewData.field_name = data.hotspotsTarget.fieldName;
            hotspotNewData.fid = data.hotspotsTarget.fid;
            hotspotNewData.entity_id = data.hotspotsTarget.entityId;
            hotspotNewData.lang = data.hotspotsTarget.lang;

            divs.$editForm.find('button').after($throbber);
            $.post(drupalSettings.path.baseUrl + 'hotspot-areas/create', hotspotNewData, function(responseData) {
              hotspotNewData = responseData;
              data.hotspots[responseData.hid] = hotspotNewData;

              var $newLabel = Drupal.behaviors.imageHotspotView.createHotspotLabel(divs.$labelsWrapper, hotspotNewData);
              Drupal.behaviors.imageHotspotView.createHotspotBox(divs.$imageWrapper, hotspotNewData);
              addEditorsToLabel($newLabel);
              closeFormAction();
            })
              .fail(function (responseData) {
                if(responseData.responseJSON && responseData.responseJSON.error) {
                  divs.$editForm.find('.form-messages').text(responseData.responseJSON.error);
                }
              })
              .always(function () {
                $throbber.remove();
              });
          }
        }

        // Sets up new options for Jcrop and shows it.
        function showJcrop() {
          var jcropSettings = {
            trueSize: [divs.$image.attr('width'), divs.$image.attr('height')],
            boxWidth: divs.$image.width(),
            boxHeight: divs.$image.height()
          };

          if (state.jcropApi === null) {
            initJcrop();
          }
          state.jcropApi.setOptions(jcropSettings);

          divs.$imageWrapper.hide();
          divs.$jcropWrapper.show();
        }

        // Releases Jcrop selection and hide it.
        function hideJcrop() {
          state.jcropApi && state.jcropApi.release();
          divs.$jcropWrapper && divs.$jcropWrapper.hide();
          divs.$imageWrapper.show();
        }

        // Remove existing box and overlays form image after successful deletion.
        function removeHotspotFromImage(hid) {
          divs.$imageWrapper.find('.overlay[data-hid="' + hid + '"]').remove();
          divs.$imageWrapper.find('.hotspot-box[data-hid="' + hid + '"]').remove();
        }

        // Edit form initialization.
        function initEditForm() {
          divs.$editForm.find('.close-button').click(function () {
            closeFormAction();
          });
          divs.$editForm.find('form').removeAttr('action');
          divs.$editForm.find('form').submit(function (e) {
            e.preventDefault();
            saveFormAction();
            return false;
          });
          divs.$editForm.keyup(function (evt) {
            evt = evt || window.event;
            if ((evt.key && evt.key == 'Escape') || (evt.keyCode == 27)) {
              closeFormAction();
            }
          });
        }

        // Creates image for jcrop and hide original.
        function initJcrop() {
          var jcropSettings = {
            keySupport: false,
            bgOpacity: 0.7
          };
          divs.$imageJcrop = divs.$image.clone();
          divs.$imageWrapper.after(divs.$imageJcrop);
          divs.$imageJcrop.Jcrop(jcropSettings, function () {
            state.jcropApi = this;
            divs.$jcropWrapper = divs.$wrapper.find('.jcrop-holder');
          });
        }

        function equalData(oldD, newD) {
          return (oldD.title == newD.title &&
          oldD.description == newD.description &&
          oldD.link == newD.link &&
          oldD.link_title == newD.link_title &&
          oldD.x == newD.x &&
          oldD.y == newD.y &&
          oldD.x2 == newD.x2 &&
          oldD.y2 == newD.y2);
        }

        // Remove 'selected' class from last button.
        function unselectButton() {
          state.currentButton && state.currentButton.removeClass('selected');
        }
      });
    }
  };
})(jQuery, Drupal);
