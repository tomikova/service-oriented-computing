$HOME/../hadoop-0.19.1/bin/hadoop dfsadmin -safemode leave;
$HOME/../hadoop-0.19.1/bin/hadoop fs -rmr log1;
$HOME/../hadoop-0.19.1/bin/hadoop fs -copyFromLocal D:\\wamp\\www\\PhotoAlbum\\app\\storage\\logs\\dnevnik.txt log1;
$HOME/../hadoop-0.19.1/bin/hadoop fs -rmr out1;
$HOME/../hadoop-0.19.1/bin/hadoop jar C:\\cygwin64\\home\\hadoop-0.19.1\\Lab2\\PhotoAlbumInfo.jar PhotoAlbumInfoStats log1 out1;
rm -f D:\\wamp\\www\\PhotoAlbum\\app\\storage\\logs\\output.txt;
$HOME/../hadoop-0.19.1/bin/hadoop fs -copyToLocal /user/tomislav-pc/tomislav/out1/part-00000 D:\\wamp\\www\\PhotoAlbum\\app\\storage\\logs\\output.txt;