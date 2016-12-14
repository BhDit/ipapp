/**
 * Initialize the form extension points.
 */
IPAPP.forms = {};

/**
 * Load the Form helper class.
 */
require('./Form');

/**
 * Define the FormError collection class.
 */
require('./FormErrors');

/**
 * Add additional HTTP / form helpers to the Hype object.
 */
$.extend(IPAPP, require('./http'));
