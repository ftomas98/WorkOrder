const { GraphQLObjectType, GraphQLInt, GraphQLString, GraphQLList } = require('graphql');
const { dbQuery } = require('../database');
const LocationType = require('./Location');
const UsersType = require('./Users');

const ManagerType = new GraphQLObjectType({
  name: 'Manager',
  fields:() => (
    {
      ManagerId: { type: GraphQLInt },
      name: { type: GraphQLString },
      location: {
        type: LocationType,
          resolve: async (manager) => {
            let res = await dbQuery(`SELECT * FROM location WHERE LocationId = ${parseInt(manager.Location_LocationId)}`);
            return res[0];
          }
      },
      user: {
        type: UsersType,
          resolve: async (manager) => {
            let res = await dbQuery(`SELECT * FROM users WHERE UsersId = ${parseInt(manager.Users_UsersId)}`);
            return res[0];
          }
      }
    }
  ) 
});

module.exports = ManagerType;