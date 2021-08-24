(function ($, Drupal, drupalSettings) {
  Drupal.behaviors.servings = {
    attach: function (context) {
      servings_user = drupalSettings.servings_user;
      servings_default = drupalSettings.servings_default;
      var spinner = $("#spinner")
          .spinner({
            min: 0,
            max: 99
          });
      $(document).ready(function () {
        $("#ing div").each(function () {
          initial = $(this).text() * (servings_user / servings_default);
          $(this).text(parseFloat(initial).toFixed(2));
        });
        servings = servings_user;
      });
      ingWidget = $("#ingredients");
      ingWidget.find("#setvalue").on("click", function () {
        servings_widget = spinner.spinner("value");
        ingWidget.find("#ing-data div").each(function () {
          final = $(this).text() * (servings_widget / servings);
          $(this).text(parseFloat(final).toFixed(2));
        });
        servings = servings_widget;
      });

    }
  };
})(jQuery, Drupal, drupalSettings);
