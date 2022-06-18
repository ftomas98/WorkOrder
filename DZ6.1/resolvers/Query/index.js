const { GraphQLObjectType } = require('graphql');

const fieldsUser = require('./user');
const fieldsUsers = require('./users');
const fieldsPosts = require('./posts');
const fieldsLocations = require('./locations');
const fieldsLocation = require('./location');
const fieldsManagers = require('./managers');

const Query = new GraphQLObjectType({
  name: 'Query',
  fields: {
    // Query one user
    user: fieldsUser,
    // Query all users
    users: fieldsUsers,
    // Query all posts
    posts: fieldsPosts,
    //  Query all locations
    locations: fieldsLocations,
    //  Query all managers
    managers: fieldsManagers,
    // Query one location
    location: fieldsLocation,
  }
});

module.exports = Query;