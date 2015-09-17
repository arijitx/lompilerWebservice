# lompilerWebservice

This is the webservice hosted in OpenShift of Lompiler a Firefox OS application https://marketplace.firefox.com/app/lompiler

The webservice end point is at http://compiler-trickthemech.rhcloud.com/API/ 
 
Currently available in 3 Languages c,cpp , java You post code, lang and input params @ http://compiler-trickthemech.rhcloud.com/API/boo.php


#Javascript Samples: 

###POST Request

```
//request body
var data = new FormData()
data.append('code',code)
data.append('input',stdin)
data.append('lang',langCode) // c or cpp or java
```

### Request response (JSON)
```
{
 'status' : ,
 'output' : 
}
```

####Sample response if code ran succesfully: 

```
{
 "status" : "OK",
 "output" : "\nHello, World"
}	
```
####Sample response if code run failed: 

```
{
 "status" : "Compilation Err",
 "output" : [
              "Admin1442479986.java:6: error: reached end of file while parsing",
              "}asdasdasd",
              " ^",
              "1 error"
            ]
}
```

##Parsing output: 
```
xhr.onload = function() {
    jsn = JSON.parse(xhr.response)    
    if(jsn['status']=="OK"){
     //code ran just fine
     res = (jsn['output']).replace('\n','')
    }else{
      //errors
      res=""
      for(var ii=0;ii<jsn['output'].length;ii++)
        res+=jsn['output'][ii]+"<br>";
    }
  };
```
