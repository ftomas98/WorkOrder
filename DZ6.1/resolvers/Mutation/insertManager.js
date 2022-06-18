// const { GraphQLString } = require('graphql');
const { GraphQLObjectType, GraphQLInt, GraphQLString, GraphQLList } = require('graphql');
const { dbQuery } = require('../../database');
const { ManagerType } = require('../../types');

const insertManager = {
  type: ManagerType,
  args: {
    name: { type: GraphQLString },
    location: { type: GraphQLString },
    users: { type: GraphQLString }
  },
  async resolve(_, { name, location, users}){
    let res = await dbQuery(`insert into Manager (name, Location_LocationId, Users_UsersId) values ('${name}', '${location}', '${users}')`);
    return { id: res.insertId, name, location, users}
  }
};

module.exports = insertManager;