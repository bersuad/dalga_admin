(function($) {
    "use strict"
    
    // Colorpicker
    $(".as_colorpicker").asColorPicker();
    $(".as_colorpicker2").asColorPicker();
    $(".complex-colorpicker").asColorPicker({
        mode: 'complex'
    });
    $(".gradient-colorpicker").asColorPicker({
        mode: 'gradient'
    });
})(jQuery);