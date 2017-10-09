;
// 会员添加界面
var member_set_ops = {
    init: function () {
        this.evntBind();
    },
    evntBind: function () {
        $(".wrap_member_set .save").click(function () {
            var btn_target = $(this);
            if (btn_target.hasClass("disabled")) {
                common_ops.alert("正在处理不要重复提交...");
                return false;
            }
            var nickname_target = $(".wrap_member_set input[name='nickname']");
            var nickname = nickname_target.val();
            var mobile_target = $(".wrap_member_set input[name='mobile']");
            var mobile = mobile_target.val();

            if (nickname.length < 1) {
                common_ops.tip("请输入符合规范的姓名", nickname_target);
                return false;
            }

            if (mobile.length < 1) {
                common_ops.tip("请输入符合规范的手机号码", mobile_target);
                return false;
            }

            btn_target.addClass("disabled");

            var data = {
                nickname:nickname,
                mobile:mobile,
                id:$(".wrap_member_set input[name=id]").val()
            };

            $.ajax({
                url:common_ops.buildWebUrl("/member/set"),
                type:'POST',
                data:data,
                dataType:'json',
                success:function (res) {
                    btn_target.removeClass("disabled");
                    var callback = null;
                    if( res.code == 200){
                      callback = function(){
                          window.location.href = common_ops.buildWebUrl("/member/index");
                      }
                    }
                    common_ops.alert(res.msg,callback);
                }
            })

        })
    }
};
$(document).ready(function () {
    member_set_ops.init();
});