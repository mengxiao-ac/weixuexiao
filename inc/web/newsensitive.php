<?php
/**
* 微教育模块
*
* @author 高贵血迹
*/
global $_GPC, $_W;
$weid = $_W['uniacid'];
load()->func('tpl');
$action = 'newsensitive';
$this1 = 'no1';
$GLOBALS['frames'] = $this->getNaveMenu('',$action,true);
$logo = pdo_fetch("SELECT a.uniacid as weid ,a.name as title FROM " . tablename('uni_account') . " as a LEFT JOIN". tablename('account'). " as b ON a.uniacid = b.uniacid AND a.default_acid = b.acid where b.isdeleted != 1 And a.default_acid != 0 AND a.uniacid = {$weid}");
$member = pdo_fetch("SELECT username FROM " . tablename('users') . " WHERE uid = {$_W['uid']}");
$logo['logo'] = tomedia('headimg_'.$weid.'.jpg');
$operation = !empty($_GPC['op']) ? $_GPC['op'] : 'display';    
$word = $this->GetSensitiveWord($weid);
if(checksubmit('submit'))
{
    if(!empty($_GPC['sensitive_word'])){
    $new_word = $_GPC['sensitive_word'];	
    }else{
        $new_word = "代孕|贷办|放贷|贷借款|贷开|戴海静|当代七整|当官要精|当官在于|党的官|党后萎|党前干劲|刀架保安|导的情人|导叫失|导人的最|导人最|导小商|到花心|得财兼|的同修|灯草和|等级證|等屁民|等人老百|等人是老|等人手术|邓爷爷转|邓玉娇|地产之歌|地下先烈|地震哥|帝国之梦|递纸死|点数优惠|电狗|电话监|电鸡|甸果敢|蝶舞按|丁香社|丁子霖|顶花心|东北独立|东复活|东京热|東京熱|洞小口紧|都当警|都当小姐|都进中央|毒蛇钻|独立台湾|赌球网|短信截|对日强硬|多美康|躲猫猫|俄羅斯|恶势力操|恶势力插|恩氟烷|阿扁推翻|作各种证|作硝化甘|唑仑|做爱小|做原子弹|做证|银都领地|维权|武县平通中学地震后维权|毛主席复活|无界浏览器|独立台湾会|反社会|回民暴动|六四事件|江独裁|赌球网站|港澳博球网|代办证件|代办移民|短信群发器|定位器|考试作弊器|全自动开锁器|针孔摄象机|唑仑乙醚|拍肩醉迷药|假币|可卡因|天安门广场血腥清场|赵紫阳在软禁中的谈话|十七大权位争霸战|中共十七大幕前戏|快速加弹器|A级|喷精|偷窥|被虐|被迫|被逼|口技|破处|幼交|狂干|阴部|緊縛|幼幼|强歼|乱交|色友|婊子|蒲团|凌辱|暴干|阴唇|插插|坐交|无毛|猛插|慰安妇|露点|露毛|自慰|色狼|胸罩|内裤|底裤|私处|同房|打炮|造爱|作爱|开苞|阴蒂|荡妇|阴囊|睾丸|捅你|捅我|插我|插你|插她|插他|干你|干她|干他|射精|屁眼|阴户|阴门|下体|龟头|阴毛|波霸|偷情|上床|制服|亚热|走光|情色|肉欲|美腿|自摸|捆绑|丝袜|潮吹|群射|少妇|臭作|薄格|調教|近親|連發|乱伦|偷拍|無修正|虐待|尿尿|喷水|一本道|夜勤病栋|避孕套|你妈逼|高潮|大法|洪志|红志|洪智|红智|法论|法沦|法伦|发轮|发论|发沦|发伦|轮公|轮攻|沦功|沦公|沦攻|论攻|论功|论公|伦攻|伦功|伦公|打倒|民运|紅智|法輪|法論|法淪|法倫|發輪|發論|發淪|發倫|輪功|輪公|輪攻|淪功|淪公|淪攻|論攻|論功|論公|倫攻|倫功|倫公|民運|台獨|臺灣獨立|西藏獨立|新疆獨立|炼功|抡功|轮大|卖国|毛厕洞|毛贼东|蒙独|枪决现场|枪模|儿园惨|儿园砍|儿园杀|儿园凶|二奶大|发牌绝|发票出|发票代|发票销|發票|法车仑|法伦功|法轮|法轮佛|法维权|法一轮|法院给废|法正乾|反测速雷|反雷达测|反屏蔽|范燕琼|方迷香|防电子眼|防身药水|房贷给废|仿真枪|仿真证|诽谤罪|费私服|封锁消|佛同修|夫妻交换|福尔马林|福娃的預|福娃頭上|福香巴|府包庇|府集中领|妇销魂|附送枪|复印件生|复印件制|富民穷|富婆给废|改号软件|感扑克|冈本真|肛门是邻|岡本真|钢针狗|钢珠枪|港澳博球|港馬會|港鑫華|高就在政|高考黑|高莺莺|搞媛交|告长期|告洋状|格证考试|各类考试|各类文凭|跟踪器|工程吞得|工力人|公安错打|公安网监|公开小姐|攻官小姐|共狗|共王储|狗粮|狗屁专家|鼓动一些|乖乖粉|官商勾|官也不容|官因发帖|光学真题|跪真相|滚圆大乳|国际投注|国家妓|国家软弱|国家吞得|国库折|国一九五七|國內美|哈药直销|海访民|豪圈钱|号屏蔽器|和狗交|和狗性|和狗做|黑火药的|红色恐怖|红外透视|紅色恐|胡江内斗|胡紧套|胡錦濤|胡适眼|胡耀邦|湖淫娘|虎头猎|华国锋|华门开|化学扫盲|划老公|还会吹萧|还看锦涛|环球证件|换妻|皇冠投注|浑圆豪乳|活不起|火车也疯|机定位器|机号定|机号卫|机卡密|机屏蔽器|基本靠吼|绩过后付|激情电|激情短|激情妹|激情炮|级办理|级答案|急需嫖|集体打砸|集体腐|挤乳汁|擠乳汁|佳静安定|家一样饱|家属被打|甲虫跳|甲流了|奸成瘾|兼职上门|监听器|监听王|简易炸|江胡内斗|江太上|江系人|江贼民|疆獨|蒋彦永|叫自慰|揭贪难|姐包夜|姐服务|姐兼职|姐上门|金扎金|金钟气|津大地震|津地震|京要地震|经典谎言|精子射在|警察被|警察的幌|警察殴打|警察说保|警车雷达|警方包庇|警用品|径步枪|敬请忍|究生答案|九龙论坛|九评共|酒象喝汤|酒像喝汤|就爱插|就要色|举国体|巨乳|据说全民|绝食声|军长发威|军刺|军品特|军用手|开邓选|开锁工具|開碼|開票|砍杀幼|砍伤儿|康没有不|康跳楼|考答案|考后付款|考机构|考考邓|考联盟|考前答|考前答案|考前付|考设备|考试包过|考试保|考试机构|考试联盟|考试枪|考研考中|考中答案|磕彰|克分析|克千术|克透视|空和雅典|孔摄像|控诉世博|控制媒|口手枪|骷髅死|快速办|矿难不公|拉登说|拉开水晶|来福猎|拦截器|狼全部跪|浪穴|老虎机|雷人女官|类准确答|黎阳平|李咏曰|理各种证|理是影帝|理证件|理做帐报|力骗中央|力月西|丽媛离|利他林|连发手|聯繫電|炼大法|两岸才子|两会代|两会又三|聊视频|聊斋艳|了件渔袍|猎好帮手|猎枪销|猎槍|獵槍|领土拿|流血事|六死|六四事|六月联盟|龙湾事件|隆手指|陆封锁|陆同修|氯胺酮|乱奸|乱伦类|乱伦小|亂倫|伦理大|伦理电影|伦理毛|伦理片|轮功|轮手枪|论文代|罗斯小姐|裸聊网|裸舞视|落霞缀|麻古|麻果配|麻果丸|麻将透|麻醉狗|麻醉枪|麻醉槍|麻醉藥|蟆叫专家|卖地财政|卖发票|卖银行卡|卖自考|漫步丝|忙爱国|猫眼工具|毛一鲜|媒体封锁|每周一死|美艳少妇|妹按摩|妹上门|门按摩|门保健|門服務|氓培训|蒙汗药|迷幻型|迷幻药|迷幻藥|迷昏口|迷昏药|迷昏藥|迷魂香|迷魂药|迷魂藥|迷奸药|迷情水|迷情药|迷藥|谜奸药|蜜穴|灭绝罪|民储害|民九亿商|民抗议|明慧网|铭记印尼|摩小姐|母乳家|木齐针|幕没有不|幕前戲|内射|南充针|嫩穴|嫩阴|泥马之歌|你的西域|拟涛哥|娘两腿之间|妞上门|浓精|怒的志愿|女被人家搞|女激情|女技师|女人和狗|女任职名|女上门|女優|鸥之歌|拍肩神药|拍肩型|牌分析|牌技网|炮的小蜜|陪考枪|配有消|喷尿|嫖俄罗|嫖鸡|平惨案|平叫到床|仆不怕饮|普通嘌|期货配|奇迹的黄|奇淫散|气狗|气枪|汽狗|汽枪|氣槍|铅弹|钱三字经|枪出售|枪的参|枪的分|枪的结|枪的制|枪货到|枪决女犯|枪手队|群体性事|枪手网|枪销售|枪械制|枪子弹|强权政府|强硬发言|抢其火炬|切听器|窃听器|禽流感了|勤捞致|氢弹手|清除负面|清純壆|情聊天室|情妹妹|情视频|情自拍|氰化钾|氰化钠|请集会|请示威|请愿|琼花问|区的雷人|娶韩国|全真证|群奸暴|群起抗暴|绕过封锁|惹的国|人权律|人体艺|人游行|人在云上|人真钱|认牌绝|任于斯国|柔胸粉|肉洞|肉棍|如厕死|乳交|软弱的国|赛后骚|三挫|三级片|三秒倒|三网友|三唑|骚妇|骚浪|骚穴|骚嘴|扫了爷爷|色电影|色妹妹|色视频|色小说|杀指南|山涉黑|煽动不明|煽动群众|上门激|烧公安局|烧瓶的|韶关斗|韶关玩|韶关旭|射网枪|涉嫌抄袭|深喉冰|神七假|神韵艺术|生被砍|生肖中特|圣战不息|盛行在舞|尸博|失身水|失意药|狮子旗|十八等|十大谎|十大禁|十个预言|十类人不|十七大幕|实毕业证|实体娃|实学历文|士康事件|式粉推|视解密|是躲猫|手变牌|手答案|手狗|手机跟|手机监|手机窃|手机追|手拉鸡|手木仓|手槍|守所死法|兽交|售步枪|售纯度|售单管|售弹簧刀|售防身|售狗子|售虎头|售火药|售假币|售健卫|售军用|售猎枪|售氯胺|售麻醉|售冒名|售枪支|售热武|售三棱|售手枪|售五四|售信用|售一元硬|售子弹|售左轮|书办理|熟妇|术牌具|双管立|双管平|水阎王|丝护士|丝情侣|丝袜保|丝袜恋|丝袜美|丝袜妹|丝袜网|丝足按|司长期有|司法黑|私房写真|死法分布|死要见毛|四博会|四大扯个|四小码|苏家屯集|诉讼集团|素女心|速代办|速取证|酸羟亚胺|蹋纳税|太王四神|泰兴幼|泰兴镇中|泰州幼|贪官也辛|探测狗|涛共产|涛一样胡|特工资|特码|特上门|体透视镜|替考|替人体|天朝特|天鹅之旅|天推广歌|田罢工|田田桑|田停工|庭保养|庭审直播|通钢总经|法论大法|偷電器|偷肃贪|偷听器|偷偷贪|头双管|透视功能|透视镜|透视扑|透视器|透视眼镜|透视药|透视仪|秃鹰汽|突破封锁|突破网路|推油按|脱衣艳|瓦斯手|袜按摩|外透视镜|外围赌球|湾版假|万能钥匙|万人骚动|王立军|王益案|网民案|网民获刑|网民诬|微型摄像|围攻警|围攻上海|维汉员|维权基|维权人|维权谈|委坐船|谓的和谐|温家堡|温切斯特|温影帝|溫家寶|瘟加饱|瘟假饱|文凭证|纹了毛|闻被控制|闻封锁|瓮安|我的西域|我搞台独|乌蝇水|无耻语录|无码专|五套功|午夜电|午夜极|武警暴|武警殴|武警已增|务员答案|务员考试|雾型迷|西藏限|西服进去|希脏|习进平|习晋平|席复活|席临终前|席指着护|洗澡死|喜贪赃|先烈纷纷|现大地震|现金投注|线透视镜|限制言|陷害案|陷害罪|相自首|香港论坛|香港马会|香港一类|香港总彩|硝化甘|小穴|校骚乱|协晃悠|写两会|泄漏的内|新建户|新疆叛|新疆限|新金瓶|新唐人|信访专班|信接收器|兴中心幼|星上门|行长王益|形透视镜|型手枪|姓忽悠|幸运码|性爱日|性福情|性感少|性推广歌|胸主席|徐玉元|学骚乱|学位證|學生妹|丫与王益|烟感器|严晓玲|言被劳教|言论罪|盐酸曲|颜射|恙虫病|姚明进去|要人权|要射精了|要射了|要泄了|夜激情|液体炸|一小撮别|遗情书|蚁力神|益关注组|益受贿|陰唇|陰道|陰戶|淫魔舞|淫情女|淫肉|淫騷妹|淫兽|淫兽学|淫水|淫穴|隐形耳|隐形喷剂|应子弹|婴儿命|咏妓|用手枪|幽谷三|游精佑|有奶不一|右转是政|幼齿类|娱乐透视|愚民同|愚民政|与狗性|玉蒲团|育部女官|冤民大|鸳鸯洗|园惨案|园发生砍|园砍杀|园凶杀|园血案|原一九五七|原装弹|袁腾飞|晕倒型|韵徐娘|遭便衣|遭到警|遭警察|遭武警|择油录|曾道人|炸弹教|炸弹遥控|炸广州|炸立交|炸药的制|炸药配|炸药制|张春桥|找枪手|找援交|找政法委副|针刺案|针刺伤|针刺事|针刺死|侦探设备|真钱斗地|真钱投注|真实文凭|真实资格|震惊一个民|震其国土|证到付款|证件办|证件集团|证生成器|证书办|证一次性|政府操|政论区|證件|植物冰|殖器护|指纹考勤|指纹膜|指纹套|至国家高|志不愿跟|制服诱|制手枪|制证定金|制作证件|中的班禅|中共黑|中国不强|种公务员|种学历证|众像羔|州惨案|州大批贪|州三箭|宙最高法|昼将近|主席忏|住英国房|助考|助考网|专业办理|专业代|专业代写|专业助|转是政府|赚钱资料|装弹甲|装枪套|装消音|着护士的胸|着涛哥|姿不对死|资格證|资料泄|梓健特药|字牌汽|自己找枪|自慰用|自由圣|自由亚|总会美女|足球玩法|最牛公安|醉钢枪|醉迷药|醉乙醚|尊爵粉|左转是政|作弊器|迷药|买卖枪支|三唑仑|麻醉药|出售枪支|天葬|出售假币|手机复制|远程偷拍|身份证生成|代开发票|枪支弹药|血腥图片|无界|催情水|变声电话|变声器|二奶大赛|全国二奶|色情电视|黄色图片|成人论坛|黄色电影|色情图片|成人网站|激情视频|激情电影|色情网站|冲灌|退团党队|退出共产党|退共党|退中共|退出党|退、团、党、队|新唐人电视台|群体灭绝|真相冤案|大屠杀|东突|伊斯兰运动|东土耳其斯坦|中国联邦临时政府|反共|武装暴动|围攻政府|祸国殃民|三班仆人派|门徒会|修宪|流亡政府|中南海|残害人群罪|大陆当局|天安门大屠杀|天安门事件|板桥春秋|大字报|反右50周年|宪政论衡|毛泽东不为人知的故事|谁是新中国|民联阵|民阵|民运圈子|奸杀|手淫|辛灏年|制造雷管|雷管制造方法|雷管制作|自制雷管|身份证生成器|精液|陆委会|汉源暴动|许万平|谢直凤|太石村|鱼窝头镇|罢官筹委会|郑茂清|锦涛|泽民|中共苏家屯|中国的仁义之举|郑筱萸|警民冲突|64学潮|六四学潮|六四纪念|新疆独立|西藏暴乱|新疆暴乱|西藏动乱|新疆动乱|64动乱|64反革命|64英雄|六四英雄|六四动乱|反革命暴乱|反革命罪|政府违纪|包围政府|集体事件|五毛党|国会金奖|激情免费下载|色诱|性爱社区|性爱图片|淫荡|露点AND图片|开锁器|解码器|出售高考试题|出售中考试题|燃烧弹|枪支|爆炸物|炸药|北川地震中死难学生家长的倡议书|蒙古独立|密穴|绵恒|木犀地|木子论坛|闹事|H动画|hgame|H游戏|二奶|法轮功|李登辉|学运|陈水扁|六四|与政府抗衡|一台一中|一边一国|拉登|自焚|共祸|共匪|亲共行动|共产小组|共奴|政治恶棍|政治小丑|大法洪传|功友|李洪志大师|李洪志先生|真善忍大法|宇宙最高法理|成人图片|激情图片|情色图片|裸体写真|少女写真|成人电影|无码电影|性爱电影|A片|色情光碟|级片|学生妹|成人文学|性爱文学|成人小说|成人聊天室|咸湿|买春|成人用品|性用品|情趣用品|一夜情|把马子|钓凯子|AV女郎|做爱|性交|援交|口交|肛交|SM|SM虐待|群交|叫床|阴茎|阴道|性器|阳具|肉棒|性侵害|猥亵|偷窥狂|冰毒|甲基苯丙胺|麻黄碱|胡椒基甲基酮|异黄樟脑|辟谷|入静|同修|布道|自杀|暴力|游行|示威|静坐|绝食|上访|两国论|台湾国|雪山狮子旗|西藏国土图|激情小电影|六合彩|非典型性肺炎|强奸|放火|杀人|打劫|轮奸|李大师|藏独|疆独|去死|性爱|西藏独立|达赖|喇嘛|达赖喇嘛|台湾独立|台独|马英九|陈水扁|萧万长|谢长廷|公投|入联公投|返联公投|江泽民|李洪志|FALUN|法轮大法|DAFA|HONGZHI|真善忍|ZHENSHANREN|YUANMAN|三去车仑|三个代表|赵紫阳|胡锦涛|李瑞环|尉健行|李岚清|邓小平|共产专制|共产极权|专政机器|共产王朝|一党专制|中共暴政|中共恶霸|中共当局|中共媒体|中共警察|中共政权|中共监狱|江泽民当局|江核心|江路线|江泽民政权|江老贼|江神经|弘法会|灵修团体|大法之声|修炼之歌|发正念|和平修念|法正人间|法正乾坤|大法弟子|天安门受难人|真修弟子|弟子正法|大陆同修|师父法身|大法师傅|法轮大法|五套功法|法轮佛法|开周天秘法|玄音大师|中功小周天|组场练功|组场治病|张宏宝尊师|中功弟子|金麒麟网|吴官正|温家宝|海洛因|摇头丸|菩提法门|台湾中华民国|达赖十四|裸|打砸抢烧|藏独|疆独|中国台北|习近平|H1n1|H1N1|甲型|猪流感|法伦大法|挨了一炮|爱液横流|安街逆|安局办公楼|安局豪华|安门事|安眠藥|案的准确|八九民|八九学|八九政治|把病人整|把邓小平|把学生整|罢工门|白黄牙签|败培训|办本科|办理本科|办理各种|办理票据|办理文凭|办理真实|办理证书|办理资格|办文凭|办怔|办证|半刺刀|辦毕业|辦證|谤罪获刑|磅解码器|磅遥控器|宝在甘肃修|保过答案|报复执法|爆发骚|北省委门|被打死|被指抄袭|被中共|本公司担|本无码|毕业證|变牌绝|辩词与梦|冰火毒|冰火佳|冰火九重|冰火漫|冰淫传|冰在火上|波推龙|博彩娱|博会暂停|博园区伪|不查都|不查全|不思四化|布卖淫女|部忙组阁|部是这样|才知道只生|财众科技|采花堂|踩踏事|苍山兰|苍蝇水|藏春阁|藏獨|操了嫂|操嫂子|策没有不|插屁屁|察象蚂|拆迁灭|车牌隐|成人电|成人卡通|成人聊|成人片|成人视|成人图|成人文|成人小|城管灭|惩公安|惩贪难|充气娃|冲凉死|抽着大中|抽着芙蓉|出成绩付|出售发票|出售军|穿透仪器|春水横溢|纯度白|纯度黄|次通过考|催眠水|催情粉|催情药|催情藥|挫仑|达毕业证|答案包|答案提供|打飞机专|打死经过|打死人|打砸办公|大鸡巴|大雞巴|大纪元|大揭露|大奶子|大批贪官|大肉棒|大嘴歌|代办发票|代办各|代办文|代办学|代办制|代辦|代表烦|代理发票|代理票据|代您考|代写毕|代写论|我操|操你|草你|我草|我艹|艹你|我擦|港独|三聚氰胺|色情|涉黄|吸毒|邪教|伊斯兰教|鸡巴|妓女|枪毙|强暴|艾滋病|恐怖分子|约炮|毒品|";
    }

    pdo_update($this->table_set, array('sensitive_word' => $new_word), array('weid' => $weid));
    $this->imessage('设置成功', $this->createWebUrl('newsensitive'), 'success');
}

include $this->template ( 'web/newsensitive' );
?>