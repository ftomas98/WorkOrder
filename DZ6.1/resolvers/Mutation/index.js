const { GraphQLObjectType } = require('graphql');
const insertUser = require('./insertUser');
const insertManager = require('./insertManager');

const Mutation = new GraphQLObjectType({
  name: 'mutation',
  fields: {
    // Insert a new user record
    insertUser: insertUser,
    insertManager: insertManager
  }
});

module.exports = Mutation;