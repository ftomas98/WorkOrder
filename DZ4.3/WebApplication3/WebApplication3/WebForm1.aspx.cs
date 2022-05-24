using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using System.Data.SqlClient;

namespace WebApplication3
{
    
    public partial class WebForm1 : System.Web.UI.Page
    {
        SqlConnection Conn = new SqlConnection(@"Data Source=(LocalDB)\MSSQLLocalDB;AttachDbFilename=C:\Users\Slavko\source\repos\WebApplication3\WebApplication3\App_Data\Database1.mdf;Integrated Security=True");
        public string finalString;

        protected void Page_Load(object sender, EventArgs e)
        {
            if (Conn.State == ConnectionState.Open)
            {
                Conn.Close();
            }
            Conn.Open();
        }

        protected void Button1_Click(object sender, EventArgs e)
        {
            ServiceReference1.WebService1SoapClient klijent = new ServiceReference1.WebService1SoapClient("WebService1Soap");
            int id = int.Parse(TextBox1.Text);
            string rezultat = klijent.GetDispatcherInfo(id);

            Label1.Text = rezultat;

        }
    }
}