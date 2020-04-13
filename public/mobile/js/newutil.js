! function (m) {
    var u = {
        toast: function (e, i, t) {
            if (t && "success" != t) {
                if ("error" == t) a = mui.toast('<div class="mui-toast-icon"><span class="fa fa-exclamation-circle"></span></div>' + e)
            } else var a = mui.toast('<div class="mui-toast-icon"><span class="fa fa-check"></span></div>' + e);
            if (i) var n = 3,
                o = setInterval(function () {
                    if (n <= 0) return clearInterval(o), void(location.href = i);
                    n--
                }, 1e3);
            return a
        },
        loading: function (e) {
            e = e || "show";
            var i = {};
            if ((t = $(".js-toast-loading")).size() <= 0) var t = $('<div style="display:none" class="mui-toast-container mui-active js-toast-loading"><div  style="display:none"class="mui-toast-message"><div class="mui-toast-icon"><span class="fa fa-spinner fa-spin"></span></div>加载中</div></div>');
            return i.show = function () {
                document.body.appendChild(t[0])
            }, i.close = function () {
                t.remove()
            }, i.hide = function () {
                t.remove()
            }, "show" == e ? i.show() : "close" == e && i.close(), i
        },
        message: function (e, i, t, a) {
            var n = $("<div>" + m.util.templates["message.html"] + "</div>");
            if (n.attr("class", "mui-content fadeInUpBig animated " + mui.className("backdrop")), n.on(mui.EVENT_MOVE, mui.preventDefault), n.css("background-color", "#efeff4"), a && n.find(".mui-desc").html(a), i) {
                var o = i.replace("##auto");
                if (n.find(".mui-btn-success").attr("href", o), -1 < i.indexOf("##auto")) var s = 5,
                    r = setInterval(function () {
                        if (s <= 0) return clearInterval(r), void(location.href = o);
                        n.find(".mui-btn-success").html(s + "秒后自动跳转"), s--
                    }, 1e3)
            }
            n.find(".mui-btn-success").click(function () {
                if (i) {
                    var e = i.replace("##auto");
                    location.href = e
                } else history.go(-1)
            }), t && "success" != t ? (t = "error") && (n.find(".title").html(e), n.find(".mui-message-icon span").attr("class", "mui-msg-error")) : (n.find(".title").html(e), n.find(".mui-message-icon span").attr("class", "mui-msg-success")), $("html").append(n[0])
        },
        alert: function (e, i, t, a) {
            return mui.alert(e, i, t, a)
        },
        confirm: function (e, i, t, a) {
            return mui.confirm(e, i, t, a)
        }
    };
    u.pay = function (t) {
        if ((t = $.extend({}, {
                enableMethod: [],
                defaultMethod: "wechat",
                payMethod: "wechat",
                orderTitle: "",
                orderTid: "",
                success: function () {},
                faild: function () {},
                finish: function () {}
            }, t)).orderFee && !(t.orderFee <= 0)) {
            !t.defaultMethod && t.payMethod && (t.defaultMethod = t.payMethod);
            var e, i, a = mui.className("active"),
                n = mui.className("backdrop"),
                o = 0 < $("#pay-detail-modal").size() ? $("#pay-detail-modal") : $('<div class="mui-modal ' + a + ' js-pay-detail-modal" id="pay-detail-modal"></div>'),
                s = ((e = document.createElement("div")).classList.add(n), e.addEventListener(mui.EVENT_MOVE, mui.preventDefault), e.addEventListener("click", function (e) {
                    if (o) return o.remove(), $(s).remove(), document.body.setAttribute("style", ""), !1
                }), e),
                r = function (e) {
                    "main" == e ? (o.find(".js-main-modal").show().addClass("fadeInRight animated"), o.find(".js-switch-pay-modal").hide(), o.find(".js-switch-modal").hide()) : "pay" == e && (o.find(".js-main-modal").hide(), o.find(".js-switch-pay-modal").show().addClass("fadeInRight animated"), o.find(".js-switch-modal").show())
                };
                //case 1
            //return u.loading().show(), t.enableMethod && 1 < t.enableMethod.length ? $.post("index.php?i=" + m.sysinfo.uniacid + "&j=" + m.sysinfo.acid + "&c=entry&m=core&do=paymethodredefined", {
            return u.loading().show(), 
			t.enableMethod && 1 < t.enableMethod.length ? $.post("index.php?i=" + m.sysinfo.uniacid + "&j=" + m.sysinfo.acid + "&c=entry&m=core&do=paymethod", {
                module: t.module,
                payweid:t.payweid,
                tid: t.orderTid,
                title: t.orderTitle,
                fee: t.orderFee,			
                // wechat_payment:t.wechat_payment
            }, function (e) {
                if (u.loading().hide(), o.html(e), s.setAttribute("style", ""), $(document.body).append(o), $(document.body).append(s), !0 ? ($(".mui-content")[0].setAttribute("style", "overflow:hidden;"), document.body.setAttribute("style", "overflow:hidden;")) : ($(".mui-content")[0].setAttribute("style", ""), document.body.setAttribute("style", "")), o.find(".js-switch-modal").click(function () {
                        r("main")
                    }), o.find(".js-switch-pay").click(function () {
                        r("pay")
                    }), o.find(".js-switch-pay-close").click(function () {
                        o.remove(), $(s).remove(), document.body.setAttribute("style", "")
                    }), o.find(".js-order-title").html(t.orderTitle), o.find(".js-pay-fee").html(t.orderFee), !(0 < o.find(".js-switch-pay-modal li").size())) return u.toast("暂无有效支付方式"), o.remove(), $(s).remove(), document.body.setAttribute("style", ""), !1;
                t.enableMethod && 0 < t.enableMethod.length ? o.find(".js-switch-pay-modal li").each(function () {
                    -1 == $.inArray($(this).data("method"), t.enableMethod) && $(this).remove()
                }) : o.find(".js-switch-pay-modal li").each(function () {
                    t.enableMethod.push($(this).data("method"))
                })
                //case 2 支付方式为微信支付
            }) : "wechat" == t.payMethod ? (i = 0, "miniprogram" === m.__wxjs_environment && (i = 1), $.post("index.php?i=" + m.sysinfo.uniacid + "&j=" + m.sysinfo.acid + "&c=entry&m=core&do=pay&iswxapp=" + i, {
                method: t.payMethod,
                tid: t.orderTid,
                payweid:t.payweid,
                title: t.orderTitle,
                fee: t.orderFee,
                module: t.module,
                // wechat_payment:t.wechat_payment,
                // user_openid:t.user_openid
            }, function (e) {
                if (u.loading().hide(), (e = $.parseJSON(e)).message.errno) {
                    if ("2" == e.message.errno) return void u.message("确认您的支付身份，跳转支付中", e.message.message, "success");
                    var i = {
                        errno: e.message.errno,
                        message: e.message.message
                    };
                    return t.fail(i), void t.complete(i)
                }
                payment = e.message.message, WeixinJSBridge.invoke("getBrandWCPayRequest", {
                    appId: payment.appId,
                    timeStamp: payment.timeStamp,
                    nonceStr: payment.nonceStr,
                    package: payment.package,
                    signType: payment.signType,
                    paySign: payment.paySign
                }, function (e) {
                    if ("get_brand_wcpay_request:ok" == e.err_msg) {
                        var i = {
                            errno: 0,
                            message: e.err_msg
                        };
                        t.success(i), t.complete(i)
                    } else "get_brand_wcpay_request:cancel" == e.err_msg ? i = {
                        errno: -1,
                        message: e.err_msg
                    } : (i = {
                        errno: -2,
                        message: e.err_msg
                    }, t.fail(i)), t.complete(i)
                })
                //case 3 支付方式为支付宝 
            // })) : "alipay" == t.payMethod ? (u.loading().hide(), $.post("index.php?i=" + m.sysinfo.uniacid + "&j=" + m.sysinfo.acid + "&c=entry&m=core&do=payredefined", {
            })) : "alipay" == t.payMethod ? (u.loading().hide(), $.post("index.php?i=" + m.sysinfo.uniacid + "&j=" + m.sysinfo.acid + "&c=entry&m=core&do=pay", {
                method: t.payMethod,
                tid: t.orderTid,
                payweid:t.payweid,
                title: t.orderTitle,
                fee: t.orderFee,
                module: t.module,
                // wechat_payment:t.wechat_payment
            }, function (e) {
                if (u.loading().hide(), (e = $.parseJSON(e)).message.errno) {
                    var i = {
                        errno: e.message.errno,
                        message: e.message.message
                    };
                    return t.fail(i), void t.complete(i)
                }
                require(["../payment/alipay/ap.js"], function () {
                    _AP.pay(e.message.message)
                })
                //case 3 其他支付方式 
            // })) : (u.loading().hide(), $.post("index.php?i=" + m.sysinfo.uniacid + "&j=" + m.sysinfo.acid + "&c=entry&m=core&do=payredefined", {
            })) : (u.loading().hide(), $.post("index.php?i=" + m.sysinfo.uniacid + "&j=" + m.sysinfo.acid + "&c=entry&m=core&do=pay", {
                method: t.payMethod,
                tid: t.orderTid,
                payweid:t.payweid,
                title: t.orderTitle,
                fee: t.orderFee,
                module: t.module,
                // wechat_payment:t.wechat_payment
            }, function (e) {
                if (e = $.parseJSON(e), u.loading().hide(), e.message.errno) {
                    var i = {
                        errno: e.message.errno,
                        message: e.message.message
                    };
                    return t.fail(i), void t.complete(i)
                }
                location.href = e.message.message
            })), !0
        }
        u.toast("请确认支付金额", "", "error")
    }, u.poppicker = function (e, t) {
        require(["mui.datepicker"], function () {
            mui.ready(function () {
                var i = new mui.PopPicker({
                    layer: e.layer || 1
                });
                i.setData(e.data), $.isFunction(e.setSelectedValue) && e.setSelectedValue(i.pickers), i.show(function (e) {
                    $.isFunction(t) && t(e), i.dispose()
                })
            })
        })
    }, u.districtpicker = function (i, o) {
        require(["mui.districtpicker"], function (n) {
            mui.ready(function () {
                var e = {
                        layer: 3,
                        data: n
                    },
                    a = {};
                $.map(n, function (e, t) {
                    if (e.text != o.province);
                    else {
                        if (a.province = t, !n[t].children) return;
                        $.map(n[t].children, function (e, i) {
                            if (e.text == o.city) {
                                if (a.city = i, !n[t].children[i].children) return;
                                return console.dir(n[t].children[i].children), void $.map(n[t].children[i].children, function (e, i) {
                                    e.text != o.district || (a.district = i)
                                })
                            }
                        })
                    }
                }), e.setSelectedValue = function (e) {
                    console.dir(a), a.province && e[0].setSelectedIndex(a.province), a.city && e[1].setSelectedIndex(a.city), a.district && e[2].setSelectedIndex(a.district)
                }, u.poppicker(e, i)
            })
        })
    }, u.datepicker = function (e, t) {
        require(["mui.datepicker"], function () {
            mui.ready(function () {
                var i;
                i = new mui.DtPicker(e), console.dir(i), i.show(function (e) {
                    $.isFunction(t) && t(e), i.dispose()
                })
            })
        })
    }, u.querystring = function (e) {
        var i = location.search.match(new RegExp("[?&]" + e + "=([^&]+)", "i"));
        return null == i || i.length < 1 ? "" : i[1]
    }, u.tomedia = function (e, i) {
        if (!e) return "";
        if (0 == e.indexOf("./addons")) return m.sysinfo.siteroot + e.replace("./", ""); - 1 != e.indexOf(m.sysinfo.siteroot) && -1 == e.indexOf("/addons/") && (e = e.substr(e.indexOf("images/"))), 0 == e.indexOf("./resource") && (e = "app/" + e.substr(2));
        var t = e.toLowerCase();
        return -1 != t.indexOf("http://") || -1 != t.indexOf("https://") ? e : e = i || !m.sysinfo.attachurl_remote ? m.sysinfo.attachurl_local + e : m.sysinfo.attachurl_remote + e
    }, u.sendCode = function (e, i) {
        var t = {
            btnElement: "",
            showElement: "",
            showTips: "%s秒后重新获取",
            btnTips: "重新获取验证码",
            successCallback: arguments[3]
        };
        if ("object" != typeof i) {
            var a = e;
            e = i;
            i = {
                btnElement: $(a),
                showElement: $(a),
                showTips: "%s秒后重新获取",
                btnTips: "重新获取验证码",
                successCallback: arguments[2]
            }
        } else i = $.extend({}, t, i);
        if (!e) return i.successCallback("1", "请填写正确的帐号");
        if (!/^1[3|4|5|7|8][0-9]{9}$/.test(e) && !/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(e)) return i.successCallback("1", "格式错误");
        var n = 60;
        i.showElement.html(i.showTips.replace("%s", n)), i.showElement.attr("disabled", !0);
        var o = setInterval(function () {
                --n <= 0 ? (clearInterval(o), n = 60, i.showElement.html(i.btnTips), i.showElement.attr("disabled", !1)) : i.showElement.html(i.showTips.replace("%s", n))
            }, 1e3),
            s = {};
        s.receiver = e, s.uniacid = m.sysinfo.uniacid, $.post("../web/index.php?c=utility&a=verifycode", s, function (e) {
            return 0 == e.message.errno ? i.successCallback("0", "验证码发送成功") : i.successCallback("1", e.message.message)
        }, "json")
    }, u.loading1 = function () {
        var e = "modal-loading",
            i = $("#" + e);
        return 0 == i.length && ($(document.body).append('<div id="' + e + '" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"></div>'), i = $("#" + e), html = '<div class="modal-dialog">\t<div style="text-align:center; background-color: transparent;">\t\t<img style="width:48px; height:48px; margin-top:100px;" src="../attachment/images/global/loading.gif" title="正在努力加载...">\t</div></div>', i.html(html)), i.modal("show"), i.next().css("z-index", 999999), i
    }, u.loaded1 = function () {
        var e = $("#modal-loading");
        0 < e.length && e.modal("hide")
    }, u.cookie = {
        prefix: "",
        set: function (e, i, t) {
            expires = new Date, expires.setTime(expires.getTime() + 1e3 * t), document.cookie = this.name(e) + "=" + escape(i) + "; expires=" + expires.toGMTString() + "; path=/"
        },
        get: function (e) {
            for (cookie_name = this.name(e) + "=", cookie_length = document.cookie.length, cookie_begin = 0; cookie_begin < cookie_length;) {
                if (value_begin = cookie_begin + cookie_name.length, document.cookie.substring(cookie_begin, value_begin) == cookie_name) {
                    var i = document.cookie.indexOf(";", value_begin);
                    return -1 == i && (i = cookie_length), unescape(document.cookie.substring(value_begin, i))
                }
                if (cookie_begin = document.cookie.indexOf(" ", cookie_begin) + 1, 0 == cookie_begin) break
            }
            return null
        },
        del: function (e) {
            new Date;
            document.cookie = this.name(e) + "=; expires=Thu, 01-Jan-70 00:00:01 GMT; path=/"
        },
        name: function (e) {
            return this.prefix + e
        }
    }, u.agent = function () {
        var e = navigator.userAgent,
            i = -1 < e.indexOf("Android") || -1 < e.indexOf("Linux"),
            t = !!e.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/);
        return i ? "android" : t ? "ios" : "unknown"
    }, u.removeHTMLTag = function (e) {
        if ("string" == typeof e) return e = (e = (e = (e = (e = e.replace(/<script[^>]*?>[\s\S]*?<\/script>/g, "")).replace(/<style[^>]*?>[\s\S]*?<\/style>/g, "")).replace(/<\/?[^>]*>/g, "")).replace(/\s+/g, "")).replace(/&nbsp;/gi, "")
    }, u.card = function () {
        $.post("./index.php?c=utility&a=card", {
            uniacid: m.sysinfo.uniacid,
            acid: m.sysinfo.acid
        }, function (e) {
            if (u.loading().hide(), 0 == (e = $.parseJSON(e)).message.errno) return u.message("没有开通会员卡功能", "", "info"), !1;
            1 == e.message.errno && wx.ready(function () {
                wx.openCard({
                    cardList: [{
                        cardId: e.message.message.card_id,
                        code: e.message.message.code
                    }]
                })
            }), 2 == e.message.errno && (location.href = "./index.php?i=" + m.sysinfo.uniacid + "&c=mc&a=card&do=mycard"), 3 == e.message.errno && (alert("由于会员卡升级到微信官方会员卡，需要您重新领取并激活会员卡"), wx.ready(function () {
                wx.addCard({
                    cardList: [{
                        cardId: e.message.message.card_id,
                        cardExt: e.message.message.card_ext
                    }],
                    success: function (e) {}
                })
            }))
        })
    }, "function" == typeof define && define.amd ? define(function () {
        return u
    }) : m.newutil = u
}(window),
function (e, i) {
    e["avatar.preview.html"] = '<div class="fadeInDownBig animated js-avatar-preview avatar-preview" style="position:relative; width:100%;z-index:9999"><img src="" alt="" class="cropper-hidden"><div class="bar-action mui-clearfix"><a href="javascript:;" class="mui-pull-left js-cancel">取消</a> <a href="javascript:;" class="mui-pull-right mui-text-right js-submit">选取</a></div></div>', e["image.preview.html"] = '<div class="bar-action mui-clearfix"><a href="javascript:;" class="mui-pull-left js-cancel">取消</a> <a href="javascript:;" class="mui-pull-right mui-text-right js-submit">删除</a></div>', e["message.html"] = '<div class="mui-content-padded"><div class="mui-message"><div class="mui-message-icon"><span></span></div><h4 class="title"></h4><p class="mui-desc"></p><div class="mui-button-area"><a href="javascript:;" class="mui-btn mui-btn-success mui-btn-block">确定</a></div></div></div>'
}(this.window.newutil.templates = this.window.newutil.templates || {});