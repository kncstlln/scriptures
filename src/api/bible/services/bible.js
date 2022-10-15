'use strict';

/**
 * bible service
 */

const { createCoreService } = require('@strapi/strapi').factories;

module.exports = createCoreService('api::bible.bible');
