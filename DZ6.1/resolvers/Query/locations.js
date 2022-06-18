const { GraphQLList } = require('graphql');
const { dbQuery } = require('../../database');
const { LocationType } = require('../../types');

const fieldsLocations = {
  type: new GraphQLList(LocationType),
  async resolve(_, {}){
    let res = await dbQuery(`SELECT * FROM location`);
    return res;
  }
};

module.exports = fieldsLocations;