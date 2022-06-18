const { GraphQLList } = require('graphql');
const { dbQuery } = require('../../database');
const { ManagerType } = require('../../types');

const fieldsManager = {
  type: new GraphQLList(ManagerType),
  async resolve(_, {}){
    let res = await dbQuery(`SELECT * FROM manager`);
    return res;
  }
};

module.exports = fieldsManager;