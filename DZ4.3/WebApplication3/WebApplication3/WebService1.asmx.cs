using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Services;
using System.Data;
using System.Data.SqlClient;

namespace WebApplication3
{
    /// <summary>
    /// Summary description for WebService1
    /// </summary>
    [WebService(Namespace = "http://tempuri.org/")]
    [WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
    [System.ComponentModel.ToolboxItem(false)]
    // To allow this Web Service to be called from script, using ASP.NET AJAX, uncomment the following line. 
    // [System.Web.Script.Services.ScriptService]
    public class WebService1 : System.Web.Services.WebService
    {
        [WebMethod]
        public string HelloWorld()
        {
            return "Hello World";
        }

        [System.Web.Services.WebMethod]
        public string GetDispatcherInfo(int id)
        {
            SqlConnection Conn = new SqlConnection(@"Data Source=(LocalDB)\MSSQLLocalDB;AttachDbFilename=C:\Users\Slavko\source\repos\WebApplication3\WebApplication3\App_Data\Database1.mdf;Integrated Security=True");

            if (Conn.State == ConnectionState.Open)
            {
                Conn.Close();
            }
            Conn.Open();

            string finalString;
            SqlCommand cmd = Conn.CreateCommand();
            cmd.CommandType = CommandType.Text;
            cmd.CommandText = "SELECT * FROM dispatchers WHERE dispatcherID=" + id.ToString();
            cmd.ExecuteNonQuery();
            SqlDataReader reader = cmd.ExecuteReader();
            finalString = string.Empty;


            
            if (reader.HasRows) 
            {
                while (reader.Read())
                {
                    string dispatcherID = reader["dispatcherID"].ToString();
                    string dispatcherName = reader["dispatcherName"].ToString();
                    string phone = reader["phone"].ToString();
                    string userFK = reader["userFK"].ToString();

                    finalString = "ID:" + dispatcherID + ", Name:" + dispatcherName + ", Phone;" + phone + ", userFK:" + userFK;
                }
            }
            return finalString;
        }
    }
}
