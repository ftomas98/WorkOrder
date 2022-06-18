const { GraphQLInt, GraphQLString, GraphQLList } = require('graphql');
const { dbQuery } = require('../../database');
const { LocationType } = require('../../types');

const fieldsLocation = {
  type: LocationType,
  args: {
    LocationId: { type: GraphQLInt }
  },
  async resolve(_, { id }){
    let res = await dbQuery(`SELECT * FROM location WHERE LocationId = ${id}`);
    return res[0];
  }
};

module.exports = fieldsLocation;