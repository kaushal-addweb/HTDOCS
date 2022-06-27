jQuery(document).ready(function() {
    jQuery('#toolbar-item-ec-store-tray.toolbar-tray-vertical .toolbar-menu a').click(function() {
        localStorage.removeItem('Drupal.toolbar.activeTabID');
    });
});