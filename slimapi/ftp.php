<?php
/**

 * User: 21104216
 * Date: 15/05/2015

username : yar
password : yar468
phpmyadmin
http://yar.lukes-server.com/phpmyadmin/
FTP
ftp: yar.lukes-server.com port 21
Control Panel
http://yar.lukes-server.com:10000
 *
 *
 *
 * SELECT members.user_name, school_activity.clicked
FROM members
Inner JOIN school_activity
ON members.user_id=school_activity.user_id
ORDER BY members.user_name;

SELECT t1.user_id, t1.user_name, t2.clicked, t1.school_name, t3.list_id, t3.list_name,t3.list_points
FROM members t1, school_activity t2, listview t3
WHERE t1.user_id = t2.user_id
AND t2.list_id = t3.list_id
 *
 * * Time: 12:09 PM

[{"user_id":"1","user_name":"yar","clicked":"11","school_name":"Zealandia","list_id":"5","list_name":"watercress","list_points":"200"},
{"user_id":"1","user_name":"yar","clicked":"6","school_name":"Zealandia","list_id":"6","list_name":"Spider","list_points":"200"},
{"user_id":"1","user_name":"yar","clicked":"7","school_name":"Zealandia","list_id":"4","list_name":"kaka","list_points":"200"},
{"user_id":"1","user_name":"yar","clicked":"3","school_name":"Zealandia","list_id":"7","list_name":"test","list_points":"10"},
{"user_id":"1","user_name":"yar","clicked":"11","school_name":"Zealandia","list_id":"5","list_name":"watercress","list_points":"200"},
{"user_id":"1","user_name":"yar","clicked":"6","school_name":"Zealandia","list_id":"6","list_name":"Spider","list_points":"200"},
{"user_id":"1","user_name":"yar","clicked":"7","school_name":"Zealandia","list_id":"4","list_name":"kaka","list_points":"200"},
{"user_id":"1","user_name":"yar","clicked":"3","school_name":"Zealandia","list_id":"7","list_name":"test","list_points":"10"},
{"user_id":"1","user_name":"yar","clicked":"1","school_name":"Zealandia","list_id":"3","list_name":"tui2","list_points":"150"},
{"user_id":"3","user_name":"leon","clicked":"2","school_name":"Zealandia","list_id":"10","list_name":"Yosemite","list_points":"2000"},
{"user_id":"3","user_name":"leon","clicked":"1","school_name":"Zealandia","list_id":"2","list_name":"tuiTest7","list_points":"50"},
{"user_id":"3","user_name":"leon","clicked":"1","school_name":"Zealandia","list_id":"10","list_name":"Yosemite","list_points":"2000"},
{"user_id":"3","user_name":"leon","clicked":"1","school_name":"Zealandia","list_id":"8","list_name":"Leopard","list_points":"1000"},
{"user_id":"3","user_name":"leon","clicked":"1","school_name":"Zealandia","list_id":"6","list_name":"Spider","list_points":"200"},
{"user_id":"3","user_name":"leon","clicked":"1","school_name":"Zealandia","list_id":"2","list_name":"tuiTest7","list_points":"50"},
{"user_id":"4","user_name":"zealandia","clicked":"1","school_name":"zealandia","list_id":"10","list_name":"Yosemite","list_points":"2000"},
{"user_id":"4","user_name":"zealandia","clicked":"1","school_name":"zealandia","list_id":"2","list_name":"tuiTest7","list_points":"50"},{
    "user_id":"4","user_name":"zealandia","clicked":"1","school_name":"zealandia","list_id":"1","list_name":"tui","list_points":"40"},
{"user_id":"4","user_name":"zealandia","clicked":"1","school_name":"zealandia","list_id":"10","list_name":"Yosemite","list_points":"2000"},
 * {"user_id":"4","user_name":"zealandia","clicked":"1","school_name":"zealandia","list_id":"1","list_name":"tui","list_points":"40"},
 * {"user_id":"4","user_name":"zealandia","clicked":"1","school_name":"zealandia","list_id":"2","list_name":"tuiTest7","list_points":"50"}]})
 * */