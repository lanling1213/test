 $(document).ready(function(){
		// var s = $(".ban_hd h3").text();
			var s = $(".position a").eq(1).text();
			
			switch(s){
				case "专业团队":
					$(".banner ").attr("class","banner1");
					break;
				case "业务专长":
					$(".banner ").attr("class","banner2");
					break;
				case "合作伙伴":
					$(".banner ").attr("class","banner2");
					break;
				case "亲办案件":
					$(".banner ").attr("class","banner3");
					break;
				case "法律资讯":
					$(".banner ").attr("class","banner4");
					break;
				case "债务知识":
					$(".banner ").attr("class","banner5");
					break;
				case "律师文集":
					$(".banner ").attr("class","banner6");
					break;
				case "关于我们":
					$(".banner ").attr("class","banner7");
					break;
				default:
					$(".banner ").attr("class","banner8");
					break;
			}
	 })