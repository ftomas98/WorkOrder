using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Services;

namespace WebApplication2
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

        [WebMethod]
        public int GetSquare(int a)
        {
            return (a * a);
        }

        [WebMethod]
        public float GetBAMtoHRK(float a)
        {
            float konverzija = 3.86f;
            a = a * konverzija;
            return a;
        }

        [WebMethod]
        public float GetHRKtoBAM(float a)
        {
            float konverzija = 0.26f;
            a = a * konverzija;
            return a;
        }

        [WebMethod]
        public float GetBAMtoRSD(float a)
        {
            float konverzija = 60.18f;
            a = a * konverzija;
            return a;
        }

        [WebMethod]
        public float GetRSDtoBAM(float a)
        {
            float konverzija = 0.017f;
            a = a * konverzija;
            return a;
        }
    }
}
