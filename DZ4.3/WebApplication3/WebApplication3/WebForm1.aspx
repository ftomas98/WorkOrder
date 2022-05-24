<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="WebForm1.aspx.cs" Inherits="WebApplication3.WebForm1" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
        <div>
        </div>
        <asp:TextBox ID="TextBox1" runat="server" placeholder="id dispacera"></asp:TextBox>
        <asp:Button ID="Button1" runat="server" Text="Pozovi Web Servis" OnClick="Button1_Click" />
        <asp:Label ID="Label1" runat="server" Text=""></asp:Label>
        <asp:Label ID="Label2" runat="server" Text=""></asp:Label>
    </form>
</body>
</html>
