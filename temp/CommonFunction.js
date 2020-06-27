
function StringFormat(str)
{
    for(var i=1;i<arguments.length;i++)
        str=str.replace("{"+(i-1)+"}",arguments[i]);
    return str;
}
String.prototype.Format=function()
{
    var str=this;
    for(var i=0;i<arguments.length;i++)
        str=str.replace("{"+(i)+"}",arguments[i]);
    return str;
}

String.format = function () {
    var s = arguments[0];
    for (var i = 0; i < arguments.length - 1; i++) {
        var reg = new RegExp("\\{" + i + "\\}", "gm");
        s = s.replace(reg, arguments[i + 1]);
    }

    return s;
}

function GetLocation(objID)
{
    var obj = null;
    if(typeof(objID) != "object")
        obj = document.getElementById(objID);
    else
        obj = objID;
                
	var x = 0;
	var y = 0;
	while(obj)
	{
		x += obj.offsetLeft;
		y += obj.offsetTop;
		obj = obj.offsetParent;
	}
	return [x,y];
}
function PopupPage(Url, Width, Height)
{ 
   var OffsetHeight =  document.body.offsetHeight;
   var OffsettWidth = document.body.offsetWidth;
   var objWindow = window.open(Url,"","width="+Width+",height="+Height+",resizable=1,scrollbars=yes,location=0");
   //objWindow.moveTo((OffsettWidth - Width)/ 2,(OffsetHeight - Height)/2);
}
function PopupPageWithMenuBar(Url, Width, Height)
{ 
   var OffsetHeight =  document.body.offsetHeight;
   var OffsettWidth = document.body.offsetWidth;
   var objWindow = window.open(Url,"","width="+Width+",height="+Height+",resizable=1,scrollbars=yes,location=0, menubar=1");
   //objWindow.moveTo((OffsettWidth - Width)/ 2,(OffsetHeight - Height)/2);
}

function OpenFancyBox(Url) {
    $.fancybox.open([
        {
            type: 'iframe',
            href: Url
        }
    ], {
        closeBtn: false,
        width: '90%',
        height: '100%',
        minWidth: '800',
        minHeight:'100%',
        margin: 5,
        padding: 5
    });
}

function OpenFancyBoxSize(Url, pWidth, pHeight) {
    $.fancybox.open([
        {
            type: 'iframe',
            href: Url
        }
    ], {
        closeBtn: false,
        width: pWidth,
        height: pHeight,
        minHeight: pHeight,
        margin: 5,
        padding: 5
    });
}

function OpenFancyBoxHaveCloseButton(Url) {
    $.fancybox.open([
        {
            type: 'iframe',
            href: Url
        }
    ], {
        width: '850',
        height: '600',
        minWidth: '800',
        margin: 5,
        padding: 5
    });
}


function LoginAgainAdmin()
{
    window.location.href = "Default.aspx";
}

function SetGuidePage(UrlGuide)
{
    var objAGuide = document.getElementById("aGuide");
    if(objAGuide != null)
    {
        var WidthGuide = "800";
        var HeightGuide = "450";
        objAGuide.href= "javascript:PopupPage('" + UrlGuide + "', " + WidthGuide + ", " + HeightGuide + ");";
    }
    else
    {
        alert("'aGuide' không tìm thấy.");
    }
}

function CheckEditData()
{
    var valid = true;
    var arrSelect = GirdViewGetSelectedRow();
    if(arrSelect.length == 0)
    {
        alert(AlertNoneSelect);
        valid = false;
    }
    else if(arrSelect.length > 1)
    {
        alert(AlertMultipleSelect);
        valid = false;
    }
    return valid;
}

function CheckDeleteData()
{
    var valid = true;
    var arrSelect = GirdViewGetSelectedRow();
    if(arrSelect.length == 0)
    {
        alert(AlertNoneSelect);
        valid = false;
    }
    else if(confirm(ConfirmDelete) == 0)
    {
        valid = false;
    }
    return valid;
}
function DisableSaveData(aSaveID)
{
    var objASave = null;
    if(typeof(aSaveID) == "string")
        objASave = document.getElementById(aSaveID);
    else
        objASave = aSaveID;
    objASave.style.display = "none";
}
function EnableDisableControl(arrAControl, IsEnable)
{
    var objA = null;
    for(var i=0; i < arrAControl.length; i++)
    {
        objA = arrAControl[i];
        if(typeof(objA) == "string")
            objA = document.getElementById(objA);
        objA.style.display = IsEnable? "" : "none";
    }
}

function GetVisibleIcon(IsVisible)
{
    if(IsVisible)
    {
        return ["VisibleSmall.gif", Visible];
    }
    return ["InvisibleSmall.gif", Invisible];
}
function OpenDictionary()
{
    PopupPage("Dictionary.aspx", 810, 300);
}
function PriceFormat(Price)
{
    var result = "";
    Price = Price + "";
    
    var StartIndex = Price.indexOf(".");
    if(StartIndex != -1)
    {
        result = "," + Price.substring(StartIndex + 1, Price.length);
    }
    else
    {
        StartIndex = Price.length;
    }
    for(var i = StartIndex - 1, Count = 0; i >= 0; i--, Count++)
    {
        result = Price.charAt(i) + ((Count%3 == 0 && Count != 0)? "." : "") + result;
    }
    return result;    
}
String.prototype.Trim = function() {
	return this.replace(/^\s+|\s+$/g,"");
}
String.prototype.LTrim = function() {
	return this.replace(/^\s+/,"");
}
String.prototype.RTrim = function() {
	return this.replace(/\s+$/,"");
}

//1 : date1 greater than date2
//-1: ----- less than -------
//0 : ----- equal -------
function CompareDate(date1,date2)
{
    var value=0;
    var arr1=date1.split("-");
    var arr2=date2.split("-");    
    value=CompareNumber(arr1[2],arr2[2]);   
    if(value!=0)
        return value;      
    value=CompareNumber(arr1[1],arr2[1]);   
    if(value!=0)
        return value;   
    value=CompareNumber(arr1[0],arr2[0]);   
    return value;    
}
function CompareNumber(num1,num2)
{ 
    num1=parseFloat(num1);
    num2=parseFloat(num2);
    if(num1>num2)
        return 1;
    if(num1<num2)
        return -1;
     return 0;
}

function IsEmail(strEmail)
{
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/;
    var valid = emailPattern.test(strEmail); //!(strEmail.indexOf("@") == -1 || strEmail.lastIndexOf(".") <= strEmail.indexOf("@"));
    return valid;
}

function IsUserName(strUserName)
{
    var userNamePattern = /^[a-zA-Z0-9.-]+$/;///^([a-zA-Z0-9._-]|[\s])+$/;
    return (userNamePattern.test(strUserName));
}
//===================================================== DATETIME ======================================================================
function AddMonths(pNgayText, pMonths) {
    var arrNgay = pNgayText.split("-");
    if (arrNgay.length == 3) {
        var d = parseInt(arrNgay[0], 10);
        var m = parseInt(arrNgay[1], 10);
        var y = parseInt(arrNgay[2], 10);
        var textDate;
        var date = new Date(y, m - 1, d);
        date.setMonth(date.getMonth() + pMonths);

        if (date.getDate() < 10) {
            textDate = "0" + date.getDate();
        }
        else {
            textDate = date.getDate();
        }

        if (date.getMonth() < 9) {
            textDate += "-0" + (date.getMonth() + 1);
        }
        else {
            textDate += "-" + (date.getMonth() + 1);
        }

        return textDate + "-" + date.getFullYear();
    }
    return "";
}

function IsValidDateTime(objTxtDate, strDateLabel) {
    var valid = true;
    var arrNgay = objTxtDate.value.split("-");
    if (arrNgay.length == 3) {
        var d = parseInt(arrNgay[0], 10);
        var m = parseInt(arrNgay[1], 10);
        var y = parseInt(arrNgay[2], 10);
        var date = new Date(y, m - 1, d);
        if (date && date.getMonth() + 1 == m && date.getDate() == d) {
            valid = true;
        }
        else {
            valid = false;
            alert(strDateLabel + " không hợp lệ.");
            objTxtDate.focus();
        }
    }
    else {
        valid = false;
        alert(strDateLabel + " không hợp lệ.");
        objTxtDate.focus();
    }
    return valid;
}

function IsValidDate(objTxtDay, objTxtMonth, objTxtYear, strDateLabel)
{
    var valid = true;    
    if(objTxtDay.value.length == 0 || isNaN(objTxtDay.value) || objTxtDay.value <= 0)
    {
        valid = false;
        alert(strDateLabel + " không hợp lệ." + " (Ngày phải là con số > 0)");
        objTxtDay.focus();
    }
    else if(objTxtMonth.value.length == 0 || isNaN(objTxtMonth.value) || objTxtMonth.value <= 0 || objTxtMonth.value > 12)
    {
        valid = false;
        alert(strDateLabel + " không hợp lệ." + " (Tháng phải là con số từ 1 -> 12)");
        objTxtMonth.focus();
    }
    else if(objTxtYear.value.length == 0 || isNaN(objTxtYear.value) || objTxtYear.value <= 0)
    {
        valid = false;
        alert(strDateLabel + " không hợp lệ." + " (Năm phải là con số > 0)");
        objTxtYear.focus();
    }
    else if(objTxtDay.value > GetMaxDay(objTxtMonth.value, objTxtYear.value))
    {
        valid = false;
        alert(strDateLabel + " không hợp lệ." + " (Ngày phải là con số từ 1 -> " + GetMaxDay(objTxtMonth.value, objTxtYear.value) + ")");
        objTxtDay.focus();
    }
    
    return valid;
}
function GetMaxDay(month, year)
{
    if (month == 2 && ((year % 400 == 0) || (year % 100 != 0 && year % 4 == 0))) return 29;
    if(month==1||month==3||month==7||month==5||month==8||month==10||month==12) return 31;
    if(month==4||month==6||month==9||month==11)return 30;
    return 28;
}
function FormatNumber(obj) 
{
    var strvalue = "";
    if (eval(obj))
        strvalue = eval(obj).value;
    else
        strvalue = obj;
    var num;
        num = strvalue.toString().replace(/\$|\,/g,'');

        if(isNaN(num))
        {
            num = "";
        }
        sign = (num == (num = Math.abs(num)));
        num = Math.floor(num*100+0.50000000001);
        num = Math.floor(num/100).toString();
        for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
        {
            num = num.substring(0,num.length-(4*i+3))+',' + num.substring(num.length-(4*i+3));
        }
        //return (((sign)?'':'-') + num);
        eval(obj).value = (((sign)?'':'-') + num);
}

function GetFormatNumber(strvalue) 
{
    var num;
        num = strvalue.toString().replace(/\$|\,/g,'');

        if(isNaN(num))
        {
            num = "";
        }
        sign = (num == (num = Math.abs(num)));
        num = Math.floor(num*100+0.50000000001);
        num = Math.floor(num/100).toString();
        for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
        {
            num = num.substring(0,num.length-(4*i+3))+',' + num.substring(num.length-(4*i+3));
        }
    return (((sign)?'':'-') + num);
}

function navigateWithReferrer(url)
{
    var fakeLink = document.createElement ("a");
    if (typeof(fakeLink.click) == 'undefined')
        location.href = url;  // sends referrer in FF, not in IE
    else
    {
        fakeLink.href = url;
        document.body.appendChild(fakeLink);
        fakeLink.click();   // click() method defined in IE only
    }
}

function LoaiBoTiengViet(str)
{  
  str= str.toLowerCase();  
  str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");  
  str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");  
  str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");  
  str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");  
  str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");  
  str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");  
  str= str.replace(/đ/g,"d"); 
   
  //str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g,"-");
  // tìm và thay thế các kí tự đặc biệt trong chuỗi sang kí tự - 
  //str= str.replace(/-+-/g,"-"); //thay thế 2- thành 1- 
  //str= str.replace(/^\-+|\-+$/g,"");  //cắt bỏ ký tự - ở đầu và cuối chuỗi    */
  
  str = str.replace(/[\s]+/g," "); //Loai bo khoang trang thua
  str = str.replace(/^\s+|\s+$/g,"");  // Loai khoang trang dau va cuoi
  return str;  
}
