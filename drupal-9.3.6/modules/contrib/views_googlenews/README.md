# Views Googlenews - Drupal 8

## ABOUT & FEATURES
The Views Googlenews module creates a format for views Feed displays that conforms to Google's requirements (see https://support.google.com/news/publisher-center/answer/74288?hl=en for more information.)

### Formatters

  Google News Feed

## INSTALLATION

Install as you would normally install a contributed Drupal module. See also
[Core Documentation](https://www.drupal.org/docs/8/extending-drupal-8/installing-modules)

## USAGE

1. Add a new view with your articles or else showing fields at: /admin/structure/views/add
2. Add a Feed display, by hitting the +Add and then Feed.
3. In the new display, under FORMAT, use the 'Google News Feed' format.
4. Google's guidelines ask that you include content that has been created in the last two days. Set a filter on "Content: Authored on" with operator "is greater than or equal to" and value type using the offset "now -2 days".
5. Configure the fields, if one is missing just choose another one hit save, add the field to the view and reshow the settings of Show: to replace them.
6. Configure the xml file's path.

## CREDIT

Maintainer:
  - [Berdir](https://www.drupal.org/u/berdir)
