<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="WebForm1.aspx.cs" Inherits="WebApplication2.WebForm1" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
    <style type="text/css">
        #form1 {
            height: 194px;
        }
    </style>
</head>
<body>
    <form id="form1" runat="server">
        <div>
        </div>
        <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
        <asp:Button ID="Button1" runat="server" Text="BAM to HRK" OnClick="Button1_Click" />
        <asp:Label ID="Label1" runat="server" Text=""></asp:Label><br/>

        <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
        <asp:Button ID="Button2" runat="server" Text="HRK to BAM" OnClick="Button2_Click" />
        <asp:Label ID="Label2" runat="server" Text=""></asp:Label><br/>

        <asp:TextBox ID="TextBox3" runat="server"></asp:TextBox>
        <asp:Button ID="Button3" runat="server" Text="BAM to RSD" OnClick="Button3_Click" />
        <asp:Label ID="Label3" runat="server" Text=""></asp:Label><br/>

        <asp:TextBox ID="TextBox4" runat="server"></asp:TextBox>
        <asp:Button ID="Button4" runat="server" Text="RSD to BAM" OnClick="Button4_Click" />
        <asp:Label ID="Label4" runat="server" Text=""></asp:Label><br/>
    </form>
</body>
</html>
