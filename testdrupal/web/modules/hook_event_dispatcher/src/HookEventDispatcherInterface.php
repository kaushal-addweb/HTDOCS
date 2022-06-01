<?php

namespace Drupal\hook_event_dispatcher;

use Drupal\core_event_dispatcher\BlockHookEvents;
use Drupal\core_event_dispatcher\CoreHookEvents;
use Drupal\core_event_dispatcher\EntityHookEvents;
use Drupal\core_event_dispatcher\FileHookEvents;
use Drupal\core_event_dispatcher\FormHookEvents;
use Drupal\core_event_dispatcher\LanguageHookEvents;
use Drupal\core_event_dispatcher\PageHookEvents;
use Drupal\core_event_dispatcher\ThemeHookEvents;
use Drupal\core_event_dispatcher\TokenHookEvents;
use Drupal\field_event_dispatcher\FieldHookEvents;
use Drupal\jsonapi_event_dispatcher\JsonApiHookEvents;
use Drupal\media_event_dispatcher\MediaHookEvents;
use Drupal\path_event_dispatcher\PathHookEvents;
use Drupal\user_event_dispatcher\UserHookEvents;
use Drupal\views_event_dispatcher\ViewsHookEvents;
use Drupal\webform_event_dispatcher\WebformHookEvents;

/**
 * Interface HookEventDispatcherInterface.
 */
interface HookEventDispatcherInterface {

  /**
   * Event name prefix to prevent name collision.
   */
  public const PREFIX = 'hook_event_dispatcher.';

  // ENTITY EVENTS.
  /**
   * Respond to creation of a new entity.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\EntityHookEvents::ENTITY_INSERT instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Entity\EntityInsertEvent
   * @see core_event_dispatcher_entity_insert()
   * @see hook_entity_insert()
   *
   * @var string
   */
  public const ENTITY_INSERT = EntityHookEvents::ENTITY_INSERT;

  /**
   * Respond to updates to an entity.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\EntityHookEvents::ENTITY_UPDATE instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Entity\EntityUpdateEvent
   * @see core_event_dispatcher_entity_update()
   * @see hook_entity_update()
   *
   * @var string
   */
  public const ENTITY_UPDATE = EntityHookEvents::ENTITY_UPDATE;

  /**
   * Act before entity deletion.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\EntityHookEvents::ENTITY_PRE_DELETE
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Entity\EntityPredeleteEvent
   * @see core_event_dispatcher_entity_predelete()
   * @see hook_entity_predelete()
   *
   * @var string
   */
  public const ENTITY_PRE_DELETE = EntityHookEvents::ENTITY_PRE_DELETE;

  /**
   * Respond to entity deletion.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\EntityHookEvents::ENTITY_DELETE instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Entity\EntityDeleteEvent
   * @see core_event_dispatcher_entity_delete()
   * @see hook_entity_delete()
   *
   * @var string
   */
  public const ENTITY_DELETE = EntityHookEvents::ENTITY_DELETE;

  /**
   * Act on an entity before it is created or updated.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\EntityHookEvents::ENTITY_PRE_SAVE instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Entity\EntityPresaveEvent
   * @see core_event_dispatcher_entity_presave()
   * @see hook_entity_presave()
   *
   * @var string
   */
  public const ENTITY_PRE_SAVE = EntityHookEvents::ENTITY_PRE_SAVE;

  /**
   * Alter entity renderable values before cache checking in drupal_render().
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\EntityHookEvents::ENTITY_BUILD_DEFAULTS_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Entity\EntityBuildDefaultsAlterEvent
   * @see core_event_dispatcher_entity_build_defaults_alter()
   * @see hook_entity_build_defaults_alter()
   *
   * @var string
   */
  public const ENTITY_BUILD_DEFAULTS_ALTER = EntityHookEvents::ENTITY_BUILD_DEFAULTS_ALTER;

  /**
   * Act on entities being assembled before rendering.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\EntityHookEvents::ENTITY_VIEW instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Entity\EntityViewEvent
   * @see core_event_dispatcher_entity_view()
   * @see hook_entity_view()
   *
   * @var string
   */
  public const ENTITY_VIEW = EntityHookEvents::ENTITY_VIEW;

  /**
   * Alter a entity being assembled right before rendering.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\EntityHookEvents::ENTITY_VIEW_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Entity\EntityViewAlterEvent
   * @see core_event_dispatcher_entity_view_alter()
   * @see hook_entity_view_alter()
   *
   * @var string
   */
  public const ENTITY_VIEW_ALTER = EntityHookEvents::ENTITY_VIEW_ALTER;

  /**
   * Control entity operation access.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\EntityHookEvents::ENTITY_ACCESS instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Entity\EntityAccessEvent
   * @see core_event_dispatcher_entity_access()
   * @see hook_entity_access()
   *
   * @var string
   */
  public const ENTITY_ACCESS = EntityHookEvents::ENTITY_ACCESS;

  /**
   * Control entity create access.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\EntityHookEvents::ENTITY_CREATE_ACCESS
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Entity\EntityCreateAccessEvent
   * @see core_event_dispatcher_entity_create_access()
   * @see hook_entity_create_access()
   *
   * @var string
   */
  public const ENTITY_CREATE_ACCESS = EntityHookEvents::ENTITY_CREATE_ACCESS;

  /**
   * Acts when creating a new entity.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\EntityHookEvents::ENTITY_CREATE instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Entity\EntityCreateEvent
   * @see core_event_dispatcher_entity_create()
   * @see hook_entity_create()
   *
   * @var string
   */
  public const ENTITY_CREATE = EntityHookEvents::ENTITY_CREATE;

  /**
   * Act on entities when loaded.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\EntityHookEvents::ENTITY_LOAD instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Entity\EntityLoadEvent
   * @see core_event_dispatcher_entity_load()
   * @see hook_entity_load()
   *
   * @var string
   */
  public const ENTITY_LOAD = EntityHookEvents::ENTITY_LOAD;

  /**
   * Respond to creation of a new entity translation.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\EntityHookEvents::ENTITY_TRANSLATION_INSERT
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Entity\EntityTranslationInsertEvent
   * @see core_event_dispatcher_entity_translation_insert()
   * @see hook_entity_translation_insert()
   *
   * @var string
   */
  public const ENTITY_TRANSLATION_INSERT = EntityHookEvents::ENTITY_TRANSLATION_INSERT;

  /**
   * Respond to deletion of a new entity translation.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\EntityHookEvents::ENTITY_TRANSLATION_DELETE
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Entity\EntityTranslationDeleteEvent
   * @see core_event_dispatcher_entity_translation_delete()
   * @see hook_entity_translation_delete()
   *
   * @var string
   */
  public const ENTITY_TRANSLATION_DELETE = EntityHookEvents::ENTITY_TRANSLATION_DELETE;

  /**
   * Control access to fields.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\EntityHookEvents::ENTITY_FIELD_ACCESS
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Entity\EntityFieldAccessEvent
   * @see core_event_dispatcher_entity_field_access()
   * @see hook_entity_field_access()
   *
   * @var string
   */
  public const ENTITY_FIELD_ACCESS = EntityHookEvents::ENTITY_FIELD_ACCESS;

  /**
   * Exposes "pseudo-field" components on content entities.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\EntityHookEvents::ENTITY_EXTRA_FIELD_INFO
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Entity\EntityExtraFieldInfoEvent
   * @see core_event_dispatcher_entity_extra_field_info()
   * @see hook_entity_extra_field_info()
   *
   * @var string
   */
  public const ENTITY_EXTRA_FIELD_INFO = EntityHookEvents::ENTITY_EXTRA_FIELD_INFO;

  /**
   * Alter "pseudo-field" components on content entities.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\EntityHookEvents::ENTITY_EXTRA_FIELD_INFO_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Entity\EntityExtraFieldInfoAlterEvent
   * @see core_event_dispatcher_entity_extra_field_info_alter()
   * @see hook_entity_extra_field_info_alter()
   *
   * @var string
   */
  public const ENTITY_EXTRA_FIELD_INFO_ALTER = EntityHookEvents::ENTITY_EXTRA_FIELD_INFO_ALTER;

  /**
   * Provides custom base field definitions for a content entity type.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\EntityHookEvents::ENTITY_BASE_FIELD_INFO
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Entity\EntityBaseFieldInfoEvent
   * @see core_event_dispatcher_entity_base_field_info()
   * @see hook_entity_base_field_info()
   *
   * @var string
   */
  public const ENTITY_BASE_FIELD_INFO = EntityHookEvents::ENTITY_BASE_FIELD_INFO;

  /**
   * Alter base field definitions for a content entity type.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\EntityHookEvents::ENTITY_BASE_FIELD_INFO_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Entity\EntityBaseFieldInfoAlterEvent
   * @see core_event_dispatcher_entity_base_field_info_alter()
   * @see hook_entity_base_field_info_alter()
   *
   * @var string
   */
  public const ENTITY_BASE_FIELD_INFO_ALTER = EntityHookEvents::ENTITY_BASE_FIELD_INFO_ALTER;

  /**
   * Alter bundle field definitions.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\EntityHookEvents::ENTITY_BUNDLE_FIELD_INFO_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Entity\EntityBundleFieldInfoAlterEvent
   * @see core_event_dispatcher_entity_bundle_field_info_alter()
   * @see hook_entity_bundle_field_info_alter()
   *
   * @var string
   */
  public const ENTITY_BUNDLE_FIELD_INFO_ALTER = EntityHookEvents::ENTITY_BUNDLE_FIELD_INFO_ALTER;

  /**
   * Entity operation.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\EntityHookEvents::ENTITY_OPERATION instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Entity\EntityOperationEvent
   * @see core_event_dispatcher_entity_operation()
   * @see hook_entity_operation()
   *
   * @var string
   */
  public const ENTITY_OPERATION = EntityHookEvents::ENTITY_OPERATION;

  /**
   * Entity operation alter.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\EntityHookEvents::ENTITY_OPERATION_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Entity\EntityOperationAlterEvent
   * @see core_event_dispatcher_entity_operation_alter()
   * @see hook_entity_operation_alter()
   *
   * @var string
   */
  public const ENTITY_OPERATION_ALTER = EntityHookEvents::ENTITY_OPERATION_ALTER;

  /**
   * Alter the entity type definitions.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\EntityHookEvents::ENTITY_TYPE_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Entity\EntityTypeAlterEvent
   * @see core_event_dispatcher_entity_type_alter()
   * @see hook_entity_type_alter()
   *
   * @var string
   */
  public const ENTITY_TYPE_ALTER = EntityHookEvents::ENTITY_TYPE_ALTER;

  /**
   * Add to entity type definitions.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\EntityHookEvents::ENTITY_TYPE_BUILD
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Entity\EntityTypeBuildEvent
   * @see core_event_dispatcher_entity_type_build()
   * @see hook_entity_type_build()
   *
   * @var string
   */
  public const ENTITY_TYPE_BUILD = EntityHookEvents::ENTITY_TYPE_BUILD;

  // FIELD EVENTS.
  /**
   * Alter forms for field widgets provided by other modules.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.0.0-rc1 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   HookEventDispatcherInterface::WIDGET_SINGLE_ELEMENT_FORM_ALTER instead.
   *
   * @see https://www.drupal.org/node/3180429
   * @see field_event_dispatcher_field_widget_form_alter()
   * @see hook_field_widget_form_alter()
   *
   * @var string
   */
  public const WIDGET_FORM_ALTER = self::PREFIX . 'widget_form.alter';

  /**
   * Alter forms for field widgets provided by other modules.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\field_event_dispatcher\FieldHookEvents::WIDGET_SINGLE_ELEMENT_FORM_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\field_event_dispatcher\Event\Field\WidgetSingleElementFormAlterEvent
   * @see field_event_dispatcher_field_widget_single_element_form_alter()
   * @see hook_field_widget_single_element_form_alter()
   *
   * @var string
   */
  public const WIDGET_SINGLE_ELEMENT_FORM_ALTER = FieldHookEvents::WIDGET_SINGLE_ELEMENT_FORM_ALTER;

  /**
   * Alter forms for multi-value field widgets provided by other modules.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.0.0-rc1 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   HookEventDispatcherInterface::WIDGET_COMPLETE_FORM_ALTER instead.
   *
   * @see https://www.drupal.org/node/3180429
   * @see field_event_dispatcher_field_widget_multivalue_form_alter()
   * @see hook_field_widget_multivalue_form_alter()
   *
   * @var string
   */
  public const WIDGET_MULTIVALUE_FORM_ALTER = self::PREFIX . 'widget_multivalue_form.alter';

  /**
   * Alter the complete form for field widgets provided by other modules.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\field_event_dispatcher\FieldHookEvents::WIDGET_COMPLETE_FORM_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\field_event_dispatcher\Event\Field\WidgetCompleteFormAlterEvent
   * @see field_event_dispatcher_field_widget_complete_form_alter()
   * @see hook_field_widget_complete_form_alter()
   *
   * @var string
   */
  public const WIDGET_COMPLETE_FORM_ALTER = FieldHookEvents::WIDGET_COMPLETE_FORM_ALTER;

  /**
   * Perform alterations on Field API formatter types.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\field_event_dispatcher\FieldHookEvents::FIELD_FORMATTER_INFO_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\field_event_dispatcher\Event\Field\FieldFormatterInfoAlterEvent
   * @see field_event_dispatcher_field_formatter_info_alter()
   * @see hook_field_formatter_info_alter()
   *
   * @var string
   */
  public const FIELD_FORMATTER_INFO_ALTER = FieldHookEvents::FIELD_FORMATTER_INFO_ALTER;

  /**
   * Alters the field formatter settings summary.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\field_event_dispatcher\FieldHookEvents::FIELD_FORMATTER_SETTINGS_SUMMARY_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\field_event_dispatcher\Event\Field\FieldFormatterSettingsSummaryAlterEvent
   * @see field_event_dispatcher_field_formatter_settings_summary_alter()
   * @see hook_field_formatter_settings_summary_alter()
   *
   * @var string
   */
  public const FIELD_FORMATTER_SETTINGS_SUMMARY_ALTER = FieldHookEvents::FIELD_FORMATTER_SETTINGS_SUMMARY_ALTER;

  /**
   * Allow modules to add field formatter settings provided by other modules.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\field_event_dispatcher\FieldHookEvents::FIELD_FORMATTER_THIRD_PARTY_SETTINGS_FORM
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\field_event_dispatcher\Event\Field\FieldFormatterThirdPartySettingsFormEvent
   * @see field_event_dispatcher_field_formatter_third_party_settings_form()
   * @see hook_field_formatter_third_party_settings_form()
   *
   * @var string
   */
  public const FIELD_FORMATTER_THIRD_PARTY_SETTINGS_FORM = FieldHookEvents::FIELD_FORMATTER_THIRD_PARTY_SETTINGS_FORM;

  /**
   * Alters the field widget settings summary.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\field_event_dispatcher\FieldHookEvents::FIELD_WIDGET_SETTINGS_SUMMARY_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\field_event_dispatcher\Event\Field\FieldWidgetSettingsSummaryAlterEvent
   * @see field_event_dispatcher_field_widget_settings_summary_alter()
   * @see hook_field_widget_settings_summary_alter()
   *
   * @var string
   */
  public const FIELD_WIDGET_SETTINGS_SUMMARY_ALTER = FieldHookEvents::FIELD_WIDGET_SETTINGS_SUMMARY_ALTER;

  /**
   * Allow modules to add settings to field widgets provided by other modules.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\field_event_dispatcher\FieldHookEvents::FIELD_WIDGET_THIRD_PARTY_SETTINGS_FORM
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\field_event_dispatcher\Event\Field\FieldWidgetThirdPartySettingsFormEvent
   * @see field_event_dispatcher_field_widget_third_party_settings_form()
   * @see hook_field_widget_third_party_settings_form()
   *
   * @var string
   */
  public const FIELD_WIDGET_THIRD_PARTY_SETTINGS_FORM = FieldHookEvents::FIELD_WIDGET_THIRD_PARTY_SETTINGS_FORM;

  // File EVENTS.
  /**
   * Control access to private file downloads and specify HTTP headers.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\FileHookEvents::FILE_DOWNLOAD instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\File\FileDownloadEvent
   * @see core_event_dispatcher_file_download()
   * @see hook_file_download()
   *
   * @var string
   */
  public const FILE_DOWNLOAD = FileHookEvents::FILE_DOWNLOAD;

  /**
   * Alter the URL to a file.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\FileHookEvents::FILE_URL_ALTER instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\File\FileUrlAlterEvent
   * @see core_event_dispatcher_file_url_alter()
   * @see hook_file_url_alter()
   *
   * @var string
   */
  public const FILE_URL_ALTER = FileHookEvents::FILE_URL_ALTER;

  /**
   * Alter MIME type mappings used to determine MIME type from a file extension.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\FileHookEvents::FILE_MIMETYPE_MAPPING_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\File\FileMimetypeMappingAlterEvent
   * @see core_event_dispatcher_file_mimetype_mapping_alter()
   * @see hook_file_mimetype_mapping_alter()
   *
   * @var string
   */
  public const FILE_MIMETYPE_MAPPING_ALTER = FileHookEvents::FILE_MIMETYPE_MAPPING_ALTER;

  /**
   * Alter archiver information declared by other modules.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\FileHookEvents::ARCHIVER_INFO_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\File\ArchiverInfoAlterEvent
   * @see core_event_dispatcher_archiver_info_alter()
   * @see hook_archiver_info_alter()
   *
   * @var string
   */
  public const ARCHIVER_INFO_ALTER = FileHookEvents::ARCHIVER_INFO_ALTER;

  /**
   * Register information about FileTransfer classes provided by a module.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\FileHookEvents::FILE_TRANSFER_INFO instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\File\FileTransferInfoEvent
   * @see core_event_dispatcher_filetransfer_info()
   * @see hook_filetransfer_info()
   *
   * @var string
   */
  public const FILE_TRANSFER_INFO = FileHookEvents::FILE_TRANSFER_INFO;

  /**
   * Alter the FileTransfer class registry.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\FileHookEvents::FILE_TRANSFER_INFO_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\File\FileTransferInfoAlterEvent
   * @see core_event_dispatcher_filetransfer_info_alter()
   * @see hook_filetransfer_info_alter()
   *
   * @var string
   */
  public const FILE_TRANSFER_INFO_ALTER = FileHookEvents::FILE_TRANSFER_INFO_ALTER;

  // FORM EVENTS.
  /**
   * Perform alterations before a form is rendered.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\FormHookEvents::FORM_ALTER instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Form\FormAlterEvent
   * @see core_event_dispatcher_form_alter()
   * @see hook_form_alter()
   *
   * @var string
   */
  public const FORM_ALTER = FormHookEvents::FORM_ALTER;

  // BLOCK EVENTS.
  /**
   * Alter the result of \Drupal\Core\Block\BlockBase::build().
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\BlockHookEvents::BLOCK_VIEW_ALTER instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Block\BlockViewAlterEvent
   * @see core_event_dispatcher_block_view_alter()
   * @see hook_block_view_alter()
   *
   * @var string
   */
  public const BLOCK_VIEW_ALTER = BlockHookEvents::BLOCK_VIEW_ALTER;

  /**
   * Alter the result of \Drupal\Core\Block\BlockBase::build().
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\BlockHookEvents::BLOCK_BUILD_ALTER instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Block\BlockBuildAlterEvent
   * @see core_event_dispatcher_block_build_alter()
   * @see hook_block_build_alter()
   *
   * @var string
   */
  public const BLOCK_BUILD_ALTER = BlockHookEvents::BLOCK_BUILD_ALTER;

  /**
   * Control access to a block instance.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\BlockHookEvents::BLOCK_ACCESS instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Block\BlockAccessEvent
   * @see core_event_dispatcher_block_access()
   * @see hook_block_access()
   *
   * @var string
   */
  public const BLOCK_ACCESS = BlockHookEvents::BLOCK_ACCESS;

  /**
   * Allow modules to alter the block plugin definitions.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\BlockHookEvents::BLOCK_ALTER instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Block\BlockAlterEvent
   * @see core_event_dispatcher_block_alter()
   * @see hook_block_alter()
   *
   * @var string
   */
  public const BLOCK_ALTER = BlockHookEvents::BLOCK_ALTER;

  // TOKEN EVENTS.
  /**
   * Provide replacement values for placeholder tokens.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\TokenHookEvents::TOKEN_REPLACEMENT instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Token\TokensReplacementEvent
   * @see core_event_dispatcher_tokens()
   * @see hook_tokens()
   *
   * @var string
   */
  public const TOKEN_REPLACEMENT = TokenHookEvents::TOKEN_REPLACEMENT;

  /**
   * Provide information about available placeholder tokens and token types.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\TokenHookEvents::TOKEN_INFO instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Token\TokensInfoEvent
   * @see core_event_dispatcher_token_info()
   * @see hook_token_info()
   *
   * @var string
   */
  public const TOKEN_INFO = TokenHookEvents::TOKEN_INFO;

  // PATH EVENTS.
  /**
   * Respond to a path being inserted.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\path_event_dispatcher\PathHookEvents::PATH_INSERT instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\path_event_dispatcher\Event\Path\PathInsertEvent
   * @see path_event_dispatcher_path_alias_insert()
   *
   * @var string
   */
  public const PATH_INSERT = PathHookEvents::PATH_INSERT;

  /**
   * Respond to a path being deleted.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\path_event_dispatcher\PathHookEvents::PATH_DELETE instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\path_event_dispatcher\Event\Path\PathDeleteEvent
   * @see path_event_dispatcher_path_alias_delete()
   *
   * @var string
   */
  public const PATH_DELETE = PathHookEvents::PATH_DELETE;

  /**
   * Respond to a path being updated.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\path_event_dispatcher\PathHookEvents::PATH_UPDATE instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\path_event_dispatcher\Event\Path\PathUpdateEvent
   * @see path_event_dispatcher_path_alias_update()
   *
   * @var string
   */
  public const PATH_UPDATE = self::PREFIX . 'path.update';

  // VIEWS EVENTS.
  /**
   * Describe data tables and fields (or the equivalent) to Views.
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\views_event_dispatcher\ViewsHookEvents::VIEWS_DATA instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\views_event_dispatcher\Event\Views\ViewsDataEvent
   * @see views_event_dispatcher_views_data()
   * @see hook_views_data()
   *
   * @var string
   */
  public const VIEWS_DATA = ViewsHookEvents::VIEWS_DATA;

  /**
   * Alter the table and field information from hook_views_data().
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\views_event_dispatcher\ViewsHookEvents::VIEWS_DATA_ALTER instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\views_event_dispatcher\Event\Views\ViewsDataAlterEvent
   * @see views_event_dispatcher_views_data_alter()
   * @see hook_views_data_alter()
   *
   * @var string
   */
  public const VIEWS_DATA_ALTER = ViewsHookEvents::VIEWS_DATA_ALTER;

  /**
   * Alter a view at the very beginning of Views processing.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\views_event_dispatcher\ViewsHookEvents::VIEWS_PRE_VIEW instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\views_event_dispatcher\Event\Views\ViewsPreViewEvent
   * @see views_event_dispatcher_views_pre_view()
   * @see hook_views_pre_view()
   *
   * @var string
   */
  public const VIEWS_PRE_VIEW = ViewsHookEvents::VIEWS_PRE_VIEW;

  /**
   * Act on the view after the query is built and just before it is executed.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\views_event_dispatcher\ViewsHookEvents::VIEWS_PRE_EXECUTE
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\views_event_dispatcher\Event\Views\ViewsPreExecuteEvent
   * @see views_event_dispatcher_views_pre_execute()
   * @see hook_views_pre_execute()
   *
   * @var string
   */
  public const VIEWS_PRE_EXECUTE = ViewsHookEvents::VIEWS_PRE_EXECUTE;

  /**
   * Act on the view immediately before rendering it.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\views_event_dispatcher\ViewsHookEvents::VIEWS_PRE_RENDER instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\views_event_dispatcher\Event\Views\ViewsPreRenderEvent
   * @see views_event_dispatcher_views_pre_render()
   * @see hook_views_pre_render()
   *
   * @var string
   */
  public const VIEWS_PRE_RENDER = ViewsHookEvents::VIEWS_PRE_RENDER;

  /**
   * Act on the view immediately after the query has been executed.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\views_event_dispatcher\ViewsHookEvents::VIEWS_POST_EXECUTE
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\views_event_dispatcher\Event\Views\ViewsPostExecuteEvent
   * @see views_event_dispatcher_views_post_execute()
   * @see hook_views_post_execute()
   *
   * @var string
   */
  public const VIEWS_POST_EXECUTE = ViewsHookEvents::VIEWS_POST_EXECUTE;

  /**
   * Post-process any rendered data.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\views_event_dispatcher\ViewsHookEvents::VIEWS_POST_RENDER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\views_event_dispatcher\Event\Views\ViewsPostRenderEvent
   * @see views_event_dispatcher_views_post_render()
   * @see hook_views_post_render()
   *
   * @var string
   */
  public const VIEWS_POST_RENDER = ViewsHookEvents::VIEWS_POST_RENDER;

  /**
   * Act on the view before the query is built, but after displays are attached.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\views_event_dispatcher\ViewsHookEvents::VIEWS_PRE_BUILD instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\views_event_dispatcher\Event\Views\ViewsPreBuildEvent
   * @see views_event_dispatcher_views_pre_build()
   * @see hook_views_pre_build()
   *
   * @var string
   */
  public const VIEWS_PRE_BUILD = ViewsHookEvents::VIEWS_PRE_BUILD;

  /**
   * Act on the view immediately after the query is built.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\views_event_dispatcher\ViewsHookEvents::VIEWS_POST_BUILD instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\views_event_dispatcher\Event\Views\ViewsPostBuildEvent
   * @see views_event_dispatcher_views_post_build()
   * @see hook_views_post_build()
   *
   * @var string
   */
  public const VIEWS_POST_BUILD = ViewsHookEvents::VIEWS_POST_BUILD;

  /**
   * Alter the query before it is executed.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\views_event_dispatcher\ViewsHookEvents::VIEWS_QUERY_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\views_event_dispatcher\Event\Views\ViewsQueryAlterEvent
   * @see views_event_dispatcher_views_query_alter()
   * @see hook_views_query_alter()
   *
   * @var string
   */
  public const VIEWS_QUERY_ALTER = ViewsHookEvents::VIEWS_QUERY_ALTER;

  /**
   * Replace special strings in the query before it is executed.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\views_event_dispatcher\ViewsHookEvents::VIEWS_QUERY_SUBSTITUTIONS
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\views_event_dispatcher\Event\Views\ViewsQuerySubstitutionsEvent
   * @see views_event_dispatcher_views_query_substitutions()
   * @see hook_views_query_substitutions()
   *
   * @var string
   */
  public const VIEWS_QUERY_SUBSTITUTIONS = ViewsHookEvents::VIEWS_QUERY_SUBSTITUTIONS;

  // THEME EVENTS.
  /**
   * Register a module or theme's theme implementations.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\ThemeHookEvents::THEME instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Theme\ThemeEvent
   * @see core_event_dispatcher_theme()
   * @see hook_theme()
   *
   * @var string
   */
  public const THEME = ThemeHookEvents::THEME;

  /**
   * Alter the theme registry information returned from hook_theme().
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\ThemeHookEvents::THEME_REGISTRY_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Theme\ThemeRegistryAlterEvent
   * @see core_event_dispatcher_theme_registry_alter()
   * @see hook_theme_registry_alter()
   *
   * @var string
   */
  public const THEME_REGISTRY_ALTER = ThemeHookEvents::THEME_REGISTRY_ALTER;

  /**
   * Alters named suggestions for all theme hooks.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\ThemeHookEvents::THEME_SUGGESTIONS_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Theme\ThemeSuggestionsAlterEvent
   * @see core_event_dispatcher_theme_suggestions_alter()
   * @see hook_theme_suggestions_alter()
   *
   * @var string
   */
  public const THEME_SUGGESTIONS_ALTER = ThemeHookEvents::THEME_SUGGESTIONS_ALTER;

  /**
   * Respond to themes being installed.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\ThemeHookEvents::THEMES_INSTALLED instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Theme\ThemesInstalledEvent
   * @see core_event_dispatcher_themes_installed()
   * @see hook_themes_installed()
   *
   * @var string
   */
  public const THEMES_INSTALLED = ThemeHookEvents::THEMES_INSTALLED;

  /**
   * Alter the default, hook-independent variables for all templates.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\ThemeHookEvents::TEMPLATE_PREPROCESS_DEFAULT_VARIABLES_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Theme\TemplatePreprocessDefaultVariablesAlterEvent
   * @see core_event_dispatcher_template_preprocess_default_variables_alter()
   * @see hook_template_preprocess_default_variables_alter()
   *
   * @var string
   */
  public const TEMPLATE_PREPROCESS_DEFAULT_VARIABLES_ALTER = ThemeHookEvents::TEMPLATE_PREPROCESS_DEFAULT_VARIABLES_ALTER;

  /**
   * Perform necessary alterations to the JS before it is presented on the page.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\ThemeHookEvents::JS_ALTER instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Theme\JsAlterEvent
   * @see core_event_dispatcher_js_alter()
   * @see hook_js_alter()
   *
   * @var string
   */
  public const JS_ALTER = ThemeHookEvents::JS_ALTER;

  /**
   * Alter the library info provided by an extension.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\ThemeHookEvents::LIBRARY_INFO_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Theme\LibraryInfoAlterEvent
   * @see core_event_dispatcher_library_info_alter()
   * @see hook_library_info_alter()
   *
   * @var string
   */
  public const LIBRARY_INFO_ALTER = ThemeHookEvents::LIBRARY_INFO_ALTER;

  // USER EVENTS.
  /**
   * Act on user account cancellations.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\user_event_dispatcher\UserHookEvents::USER_CANCEL instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\user_event_dispatcher\Event\User\UserCancelEvent
   * @see user_event_dispatcher_user_cancel()
   * @see hook_user_cancel()
   *
   * @var string
   */
  public const USER_CANCEL = UserHookEvents::USER_CANCEL;

  /**
   * Modify account cancellation methods.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\user_event_dispatcher\UserHookEvents::USER_CANCEL_METHODS_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\user_event_dispatcher\Event\User\UserCancelMethodsAlterEvent
   * @see user_event_dispatcher_user_cancel_methods_alter()
   * @see hook_user_cancel_methods_alter()
   *
   * @var string
   */
  public const USER_CANCEL_METHODS_ALTER = UserHookEvents::USER_CANCEL_METHODS_ALTER;

  /**
   * The user just logged in.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\user_event_dispatcher\UserHookEvents::USER_LOGIN instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\user_event_dispatcher\Event\User\UserLoginEvent
   * @see user_event_dispatcher_user_login()
   * @see hook_user_login()
   *
   * @var string
   */
  public const USER_LOGIN = UserHookEvents::USER_LOGIN;

  /**
   * The user just logged out.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\user_event_dispatcher\UserHookEvents::USER_LOGOUT instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\user_event_dispatcher\Event\User\UserLogoutEvent
   * @see user_event_dispatcher_user_logout()
   * @see hook_user_logout()
   *
   * @var string
   */
  public const USER_LOGOUT = UserHookEvents::USER_LOGOUT;

  /**
   * Alter the username that is displayed for a user.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\user_event_dispatcher\UserHookEvents::USER_FORMAT_NAME_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\user_event_dispatcher\Event\User\UserFormatNameAlterEvent
   * @see user_event_dispatcher_user_format_name_alter()
   * @see hook_user_format_name_alter()
   *
   * @var string
   */
  public const USER_FORMAT_NAME_ALTER = UserHookEvents::USER_FORMAT_NAME_ALTER;

  // TOOLBAR EVENTS.
  /**
   * Alter the toolbar menu after hook_toolbar() is invoked.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\toolbar_event_dispatcher\ToolbarHookEvents::TOOLBAR instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\toolbar_event_dispatcher\Event\Toolbar\ToolbarEvent
   * @see toolbar_event_dispatcher_toolbar()
   * @see hook_toolbar()
   *
   * @var string
   */
  public const TOOLBAR = self::PREFIX . 'toolbar';

  /**
   * Alter the toolbar menu after hook_toolbar() is invoked.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\toolbar_event_dispatcher\ToolbarHookEvents::TOOLBAR_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\toolbar_event_dispatcher\Event\Toolbar\ToolbarAlterEvent
   * @see toolbar_event_dispatcher_toolbar_alter()
   * @see hook_toolbar_alter()
   *
   * @var string
   */
  public const TOOLBAR_ALTER = self::PREFIX . 'toolbar.alter';

  // PAGE EVENTS.
  /**
   * Add a renderable array to the top of the page.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\PageHookEvents::PAGE_TOP instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Theme\PageTopEvent
   * @see core_event_dispatcher_page_top()
   * @see hook_page_top()
   *
   * @var string
   */
  public const PAGE_TOP = PageHookEvents::PAGE_TOP;

  /**
   * Add a renderable array to the bottom of the page.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\PageHookEvents::PAGE_BOTTOM instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see core_event_dispatcher_page_bottom()
   * @see hook_page_bottom()
   *
   * @var string
   */
  public const PAGE_BOTTOM = PageHookEvents::PAGE_BOTTOM;

  /**
   * Add attachments (typically assets) to a page before it is rendered.
   *
   * Attachments should be added to individual element render arrays whenever
   * possible, as per Drupal best practices, so only use this when that isn't
   * practical or you need to target the page itself.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\PageHookEvents::PAGE_ATTACHMENTS instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Theme\PageAttachmentsEvent
   * @see core_event_dispatcher_page_attachments()
   * @see hook_page_attachments()
   *
   * @var string
   */
  public const PAGE_ATTACHMENTS = PageHookEvents::PAGE_ATTACHMENTS;

  // CORE EVENTS.
  /**
   * Perform periodic actions.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\CoreHookEvents::CRON instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Core\CronEvent
   * @see core_event_dispatcher_cron()
   * @see hook_cron()
   *
   * @var string
   */
  public const CRON = CoreHookEvents::CRON;

  /**
   * Alter available data types for typed data wrappers.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\CoreHookEvents::DATA_TYPE_INFO_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Core\DataTypeInfoAlterEvent
   * @see core_event_dispatcher_data_type_info_alter()
   * @see hook_data_type_info()
   *
   * @var string
   */
  public const DATA_TYPE_INFO_ALTER = CoreHookEvents::DATA_TYPE_INFO_ALTER;

  /**
   * Alter cron queue information before cron runs.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\CoreHookEvents::QUEUE_INFO_ALTER instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Core\QueueInfoAlterEvent
   * @see core_event_dispatcher_queue_info_alter()
   * @see hook_queue_info_alter()
   *
   * @var string
   */
  public const QUEUE_INFO_ALTER = CoreHookEvents::QUEUE_INFO_ALTER;

  /**
   * Alter an email message created with MailManagerInterface->mail().
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\CoreHookEvents::MAIL_ALTER instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Core\MailAlterEvent
   * @see \core_event_dispatcher_mail_alter()
   * @see \hook_mail_alter()
   *
   * @var string
   */
  public const MAIL_ALTER = CoreHookEvents::MAIL_ALTER;

  /**
   * Alter the list of mail backend plugin definitions.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\CoreHookEvents::MAIL_BACKEND_INFO_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Core\MailBackendInfoAlterEvent
   * @see \core_event_dispatcher_mail_backend_info_alter()
   * @see \hook_mail_backend_info_alter()
   *
   * @var string
   */
  public const MAIL_BACKEND_INFO_ALTER = CoreHookEvents::MAIL_BACKEND_INFO_ALTER;

  /**
   * Alter the default country list.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\CoreHookEvents::COUNTRIES_ALTER instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Core\CountriesAlterEvent
   * @see core_event_dispatcher_countries_alter()
   * @see hook_countries_alter()
   *
   * @var string
   */
  public const COUNTRIES_ALTER = CoreHookEvents::COUNTRIES_ALTER;

  /**
   * Alter display variant plugin definitions.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\CoreHookEvents::DISPLAY_VARIANT_PLUGIN_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Core\DisplayVariantPluginAlterEvent
   * @see core_event_dispatcher_display_variant_plugin_alter()
   * @see hook_display_variant_plugin_alter()
   *
   * @var string
   */
  public const DISPLAY_VARIANT_PLUGIN_ALTER = CoreHookEvents::DISPLAY_VARIANT_PLUGIN_ALTER;

  /**
   * Allow modules to alter layout plugin definitions.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\CoreHookEvents::LAYOUT_ALTER instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Core\LayoutAlterEvent
   * @see core_event_dispatcher_layout_alter()
   * @see hook_layout_alter()
   *
   * @var string
   */
  public const LAYOUT_ALTER = CoreHookEvents::LAYOUT_ALTER;

  /**
   * Flush all persistent and static caches.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\CoreHookEvents::CACHE_FLUSH instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Core\CacheFlushEvent
   * @see core_event_dispatcher_cache_flush()
   * @see hook_cache_flush()
   *
   * @var string
   */
  public const CACHE_FLUSH = CoreHookEvents::CACHE_FLUSH;

  /**
   * Rebuild data based upon refreshed caches.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\CoreHookEvents::REBUILD instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Core\RebuildEvent
   * @see core_event_dispatcher_rebuild()
   * @see hook_rebuild()
   *
   * @var string
   */
  public const REBUILD = CoreHookEvents::REBUILD;

  /**
   * Alter the configuration synchronization steps.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\CoreHookEvents::CONFIG_IMPORT_STEPS_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Core\ConfigImportStepsAlterEvent
   * @see core_event_dispatcher_config_import_steps_alter()
   * @see hook_config_import_steps_alter()
   *
   * @var string
   */
  public const CONFIG_IMPORT_STEPS_ALTER = CoreHookEvents::CONFIG_IMPORT_STEPS_ALTER;

  /**
   * Alter config typed data definitions.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\CoreHookEvents::CONFIG_SCHEMA_INFO_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Core\ConfigSchemaInfoAlterEvent
   * @see core_event_dispatcher_config_schema_info_alter()
   * @see hook_config_schema_info_alter()
   *
   * @var string
   */
  public const CONFIG_SCHEMA_INFO_ALTER = CoreHookEvents::CONFIG_SCHEMA_INFO_ALTER;

  /**
   * Alter validation constraint plugin definitions.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\CoreHookEvents::VALIDATION_CONSTRAINT_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Core\ValidationConstraintAlterEvent
   * @see core_event_dispatcher_validation_constraint_alter()
   * @see hook_validation_constraint_alter()
   *
   * @var string
   */
  public const VALIDATION_CONSTRAINT_ALTER = CoreHookEvents::VALIDATION_CONSTRAINT_ALTER;

  // LANGUAGE EVENTS.
  /**
   * Alter the links generated to switch languages.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\core_event_dispatcher\LanguageHookEvents::LANGUAGE_SWITCH_LINKS_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\core_event_dispatcher\Event\Language\LanguageSwitchLinksAlterEvent
   * @see core_event_dispatcher_language_switch_links_alter()
   * @see hook_language_switch_links_alter()
   *
   * @var string
   */
  public const LANGUAGE_SWITCH_LINKS_ALTER = LanguageHookEvents::LANGUAGE_SWITCH_LINKS_ALTER;

  // WEBFORM EVENTS.
  /**
   * Respond to webform elements being rendered.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\webform_event_dispatcher\WebformHookEvents::WEBFORM_ELEMENT_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\webform_event_dispatcher\Event\WebformElement\WebformElementAlterEvent
   * @see webform_event_dispatcher_webform_element_alter()
   * @see hook_webform_element_alter()
   *
   * @var string
   */
  public const WEBFORM_ELEMENT_ALTER = WebformHookEvents::WEBFORM_ELEMENT_ALTER;

  /**
   * Respond to webform element info being initialized.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\webform_event_dispatcher\WebformHookEvents::WEBFORM_ELEMENT_INFO_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\webform_event_dispatcher\Event\WebformElement\WebformElementInfoAlterEvent
   * @see webform_event_dispatcher_webform_element_info_alter()
   * @see hook_webform_element_info_alter()
   *
   * @var string
   */
  public const WEBFORM_ELEMENT_INFO_ALTER = WebformHookEvents::WEBFORM_ELEMENT_INFO_ALTER;

  // MEDIA EVENTS.
  /**
   * Alters the information provided in \Drupal\media\Annotation\MediaSource.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\media_event_dispatcher\MediaHookEvents::MEDIA_SOURCE_INFO_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see media_event_dispatcher_media_source_info_alter()
   * @see hook_media_source_info_alter()
   *
   * @var string
   */
  public const MEDIA_SOURCE_INFO_ALTER = MediaHookEvents::MEDIA_SOURCE_INFO_ALTER;

  /**
   * Alters an oEmbed resource URL before it is fetched.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\media_event_dispatcher\MediaHookEvents::MEDIA_OEMBED_RESOURCE_DATA_ALTER
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see media_event_dispatcher_oembed_resource_url_alter()
   * @see hook_oembed_resource_url_alter()
   *
   * @var string
   */
  public const MEDIA_OEMBED_RESOURCE_DATA_ALTER = MediaHookEvents::MEDIA_OEMBED_RESOURCE_DATA_ALTER;

  // JSONAPI EVENTS.
  /**
   * Controls access when filtering by entity data via JSON:API.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\jsonapi_event_dispatcher\JsonApiHookEvents::JSONAPI_ENTITY_FILTER_ACCESS
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\jsonapi_event_dispatcher\Event\JsonApiEntityFilterAccessEvent
   * @see jsonapi_event_dispatcher_jsonapi_entity_filter_access()
   * @see hook_jsonapi_entity_filter_access()
   *
   * @var string
   */
  public const JSONAPI_ENTITY_FILTER_ACCESS = JsonApiHookEvents::JSONAPI_ENTITY_FILTER_ACCESS;

  /**
   * Restricts filtering access to the given field.
   *
   * @Event
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\jsonapi_event_dispatcher\JsonApiHookEvents::JSONAPI_ENTITY_FIELD_FILTER_ACCESS
   *   instead.
   *
   * @see https://www.drupal.org/node/3263301
   * @see \Drupal\jsonapi_event_dispatcher\Event\JsonApiEntityFieldFilterAccessEvent
   * @see jsonapi_event_dispatcher_jsonapi_entity_field_filter_access()
   * @see hook_jsonapi_entity_field_filter_access()
   *
   * @var string
   */
  public const JSONAPI_ENTITY_FIELD_FILTER_ACCESS = JsonApiHookEvents::JSONAPI_ENTITY_FIELD_FILTER_ACCESS;

}
