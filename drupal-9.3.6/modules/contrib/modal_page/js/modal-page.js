/**
 * @file
 * Default JavaScript file for Modal Page.
 */

(function ($, Drupal, drupalSettings) {
  'use strict';

  Drupal.behaviors.modalPage = {
    attach: function (context, settings) {

      // Get Modals to Show.
      var modals = $('.js-modal-page-show', context);

      // Verify if there is Modal.
      if (!modals.length) {
        return false;
      }

      // Verify if this project should load Bootstrap automatically.
      var verify_load_bootstrap_automatically = true;
      if (typeof settings.modal_page != 'undefined' && settings.modal_page.verify_load_bootstrap_automatically != 'undefined') {
        verify_load_bootstrap_automatically = settings.modal_page.verify_load_bootstrap_automatically;
      }

      // If Bootstrap is automatic enable it only if its necessary.
      if (!$.fn.modal && verify_load_bootstrap_automatically) {
        $.ajax({url: "/modal-page/ajax/enable-bootstrap", success: function(result){
          location.reload();
        }});
      }

      // Foreach in all Modals.
      $(modals).each(function(index) {

        // Get default variables.
        var modal = $(this);
        var checkbox_please_do_not_show_again = $('.modal-page-please-do-not-show-again', modal);
        var id_modal = checkbox_please_do_not_show_again.val();

        // New cookie name. Keeping the first one to maintain compatibility.
        var hide_modal_cookie = $.cookie('hide_modal_id_' + id_modal) || $.cookie('please_do_not_show_again_modal_id_' + id_modal);

        // Verify don't show again option.
        if (hide_modal_cookie) {
          return;
        }

        // Verify auto-open.
        var auto_open = true;

        if (typeof modal.data('modal-options').auto_open != 'undefined' && typeof modal.data('modal-options').auto_open != 'undefined') {
          auto_open = modal.data('modal-options').auto_open;
        }


        modal.on('shown.bs.modal', function() {
          $(this).find(".js-modal-page-ok-buttom").first().focus();
        });

        modal.on('keydown', function(e) {
          var keyCode = e.keyCode || e.which;
          var lastElement = $(this).find('.js-modal-page-ok-buttom').last().is(':focus');
          var firstElement = $(this).find(".js-modal-page-ok-buttom").first().is(':focus');

          if (keyCode === 9 && !e.shiftKey && lastElement) {
            e.preventDefault();
            $(this).find(".js-modal-page-ok-buttom").first().focus();
          } else if(keyCode === 9 && e.shiftKey && firstElement) {
            e.preventDefault();
            $(this).find(".js-modal-page-ok-buttom").last().focus();
          }
        });

        // Open Modal on Auto Open.
        if (auto_open == true) {

          // Verify if there is a delay to show Modal.
          var delay = $(modal).find('#delay_display').val() * 1000;

          setTimeout(function () {
            modal.modal();
          }, delay);
        }

        // Open Modal Page clicking on "open-modal-page" class.
        $('.open-modal-page', modal).on('click', function () {
          modal.modal();
        });

        // Open Modal Page clicking on user custom element.
        if (typeof modal.data('modal-options').open_modal_on_element_click != 'undefined' && modal.data('modal-options').open_modal_on_element_click) {

          var link_open_modal = modal.data('modal-options').open_modal_on_element_click;

          $(link_open_modal).on('click', function () {
            modal.modal();
          });
        }

        var ok_button = $('.js-modal-page-ok-button', modal);

        ok_button.on('click', function () {

          if (checkbox_please_do_not_show_again.is(':checked')) {

            $.cookie('hide_modal_id_' + id_modal, true, {expires: 365 * 20, path: '/'});

          }

          var modalElement = $('.js-modal-page-ok-button').parents('#js-modal-page-show-modal');

          // URL to send data.
          var urlModalSubmit = "/modal/ajax/hook-modal-submit";

          // Get Modal Options.
          var modalOptions = modalElement.data('modal-options');

          // Get Modal ID.
          var modalId = modalOptions.id;

          var dontShowAgainOption = modalElement.find('.modal-page-please-do-not-show-again').is(':checked');

          var modalState = new Object();

          modalState.dont_show_again_option = dontShowAgainOption;

          // Params to be sent.
          var params = new Object();

          // Send Modal ID.
          params.id = modalId;

          // Send Modal State.
          params.modal_state = modalState;

          $.post(urlModalSubmit, params, function(result) {});

          var redirect = $(this).attr('data-redirect');
          if (typeof redirect != 'undefined' && redirect.length > 0) {
            window.location.replace(redirect);
          }

        });

      });
    }
  };
})(jQuery, Drupal, drupalSettings);
