using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace WebApplication2
{
    public partial class WebForm1 : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {

        }

        protected void Button1_Click(object sender, EventArgs e)
        {
            ServiceReference1.WebService1SoapClient klijent = new ServiceReference1.WebService1SoapClient("WebService1Soap");
            float broj = float.Parse(TextBox1.Text);
            float rezultat = klijent.GetBAMtoHRK(broj);
            Label1.Text = "Rezultat je: " + rezultat;
        }

        protected void Button2_Click(object sender, EventArgs e)
        {
            ServiceReference1.WebService1SoapClient klijent = new ServiceReference1.WebService1SoapClient("WebService1Soap");
            float broj = float.Parse(TextBox2.Text);
            float rezultat = klijent.GetHRKtoBAM(broj);
            Label2.Text = "Rezultat je: " + rezultat;
        }

        protected void Button3_Click(object sender, EventArgs e)
        {
            ServiceReference1.WebService1SoapClient klijent = new ServiceReference1.WebService1SoapClient("WebService1Soap");
            float broj = float.Parse(TextBox3.Text);
            float rezultat = klijent.GetBAMtoRSD(broj);
            Label3.Text = "Rezultat je: " + rezultat;
        }

        protected void Button4_Click(object sender, EventArgs e)
        {
            ServiceReference1.WebService1SoapClient klijent = new ServiceReference1.WebService1SoapClient("WebService1Soap");
            float broj = float.Parse(TextBox4.Text);
            float rezultat = klijent.GetRSDtoBAM(broj);
            Label4.Text = "Rezultat je: " + rezultat;
        }
    }
}