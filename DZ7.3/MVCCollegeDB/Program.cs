using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Threading;
using System.Threading.Tasks;
using Google.Apis.Auth.OAuth2;
using Google.Apis.Util;
using Google.Apis.Gmail.v1;
using Google.Apis.Services;

namespace MVCworkorderDB
{
    class Program
    {
   
            static void Main(string[] args)
            {
                string clientId = "203889954746-cl3upnrcfvg6ko25bf9iu2l7daeu8ki1.apps.googleusercontent.com";
                string clientSecret = "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";

                string[] scopes = { "https://www.googleapis.com/auth/gmail.readonly" };
                var credentials = GoogleWebAuthorizationBroker.AuthorizeAsync(
                    new ClientSecrets
                    {
                        ClientId = clientId,
                        ClientSecret = clientSecret,
                    },
                scopes,"user", CancellationToken.None).Result;

                    if (credentials.Token.IsExpired(SystemClock.Default))
                        credentials.RefreshTokenAsync(CancellationToken.None).Wait();

            var service = new GmailService(new BaseClientService.Initializer()
            {
                HttpClientInitializer = credentials
            });

            var profile = service.Users.GetProfile("andro.raspa@gmail.com").Execute();
            Console.WriteLine(profile.MessagesTotal);
            Console.ReadLine();



                }
            }

        }
    
