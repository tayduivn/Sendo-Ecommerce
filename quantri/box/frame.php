

<?
	switch ($_REQUEST['act'])
	{
		case "ykien":
			include("./mod/ykien.php");
			break;
			case "autoaddup":
			include("./mod/autoaddup.php");
			break;
		case "currency":
			include("./mod/currency.php");
	         break;
		case "ngansach":
			include("./mod/ngansach.php");
			break;						case "cauhinhdiemlua":			include("./mod/cauhinhdiemlua.php");			break;						case "cauhinhphivanchuyen":			include("./mod/cauhinhphivanchuyen.php");			break;
				case "ruttien":
			include("./mod/ruttien.php");
			break;
				case "naptien":
			include("./mod/naptien.php");
			break;
		case "dangkydichvu_reg":
			include("./mod/dangkydichvu_reg.php");
			break;
			case "mualuotup_reg":
			include("./mod/mualuotup_reg.php");
			break;
		case "thongke":
			include("./mod/admin_thongke_ykien.php");
			break;
		case "link_website":
			include("./mod/admin_link_website.php");
			break;
		case "link_website_m":
			include("./mod/admin_link_website_m.php");
			break;
		case "link_website_category":
			include("./mod/admin_link_website_category.php");
			break;
		case "link_website_category_m":
			include("./mod/admin_link_website_category_m.php");
			break;	
		case "online":
			include("./mod/admin_online.php");
			break;			
		case "online_m":
			include("./mod/admin_online_m.php");
			break;	
		case "news_category":
			include("./mod/admin_news_category.php");
			break;
		case "news_category_m":
			include("./mod/admin_news_category_m.php");
			break;	
		case "news":
			include("./mod/admin_news.php");
			break;
		case "news_m":
			include("./mod/admin_news_m.php");
			break;
		case "comment":
			include("./mod/comment.php");
			break;
		case "comment_m":
			include("./mod/comment_m.php");
			break;
		case "news_top":
			include("./mod/admin_news_top.php");
			break;
		case "album_category":
			include("./mod/admin_album_category.php");
			break;
		case "album_category_m":
			include("./mod/admin_album_category_m.php");
			break;
		case "album_image":
			include("./mod/admin_album_image.php");
			break;
		case "album_image_m":
			include("./mod/admin_album_image_m.php");
			break;
		case "content":
			include("./mod/admin_content.php");
			break;
		case "customer":
			include("./mod/admin_customer.php");
			break;
		case "category":
			include("./mod/admin_category.php");
			break;
		case "category_m":
			include("./mod/admin_category_m.php");
			break;
		case "dangkyquangcao":
			include("./mod/dangkyquangcao.php");
			break;
		case "category_dc":
			include("./mod/admin_category_dc.php");
			break;
		case "category_dc_m":
			include("./mod/admin_category_dc_m.php");
				break;
		case "dichvukhac":
			include("./mod/dichvukhac.php");
			break;

		case "provider":
			include("./mod/admin_provider.php");
			break;
		case "provider_m":
			include("./mod/admin_provider_m.php");
			break;
		case "sanpham":
			include("./mod/sanpham.php");
			break;
		case "product_chuaduyet":
			include("products_choduyet.php");
			break;
		case "product_m":
			include("./mod/admin_product_m.php");
			break;
			 case "themsanpham":
			include("./mod/themsanpham.php");
			break;
		case "adv":
			include("./mod/adv.php");
			break;
		case "adv_m":
			include("./mod/adv_m.php");
			break;
		case "bds":
			include("./mod/bds.php");
			break;
		case "bds_m":
			include("./mod/bds_m.php");
			break;
		case "job":
			include("./mod/job.php");
			break;
		case "job_m":
			include("./mod/job_m.php");
			break;
		case "giaodienchinh":
			include("./mod/giaodienchinh.php");
			break;
		case "company":
			include("./mod/company.php");
			break;
		case "company_m":
			include("./mod/company_m.php");
			break;
		case "product_dc":
			include("./mod/admin_product_dc.php");
			break;
		case "product_dc_m":
			include("./mod/admin_product_dc_m.php");
			break;
		case "multiple_products":
			include("./mod_multil/index.php");
			break;
		case "order":
			include("./mod/admin_order.php");
			break;
		case "login":
			include("./mod/admin_login.php");
			break;
		case "changepass":
			include("./mod/admin_changepass.php");
			break;
		case "customer":
			include("./mod/admin_customer.php");
			break;
		case "order":
			include("./mod/admin_order.php");
			break;
		case "order_pending":
			include("./mod/admin_order_pending.php");
			break;
		case "order_ok":
			include("./mod/admin_order_ok.php");
			break;
		case "orderdetail":
			include("./mod/admin_orderdetail.php");
			break;
		case "users":
			include("./mod/users.php");
			break;
		case "users_add":
			include("./mod/users_add.php");
			break;
		case "admin_config":
			include("./mod/admin_config.php");
			break;
		case "slider_show":
			include("./mod/admin_slider_show.php");
			break;
		case "slider_show_m":
			include("./mod/admin_slider_show_m.php");
			break;
		case "thongke_site":
			include("./mod/thongke.php");
			break;
		case "search" :
		    include("search_code.php"); 
		    break;
		case "pro_point" :
		    include("./mod/point.php"); 
		    break;
		case "pro_sell" :
		    include("./mod/point_sell.php"); 
		    break;
		case "pro_new" :
		    include("./mod/point_new.php"); 
		    break;
		case "change_shop" :
		    include("./mod/admin_setup.php"); 
		    break;
		case "change_shop1" :
		    include("./mod/admin_setup1.php"); 
		    break;
		case "change_active_vip" :
		    include("./mod/admin_active_vip.php"); 
			break;
		case "dangkydichvu" :
		    include("./mod/dangkydichvu.php"); 
			break;
		case "dichvuquangcao" :
		    include("./mod/dichvuquangcao.php"); 
			break;
		case "dichvuupsanpham" :
		    include("./mod/dichvuupsanpham.php");
			break;
		case "tunhapcss" :
		    include("./mod/admin_tunhapcss.php"); 
			break;
		case "chanweb" :
		    include("./mod/chanweb.php"); 
			break;
		case "lienhe" :
		    include("./mod/lienhe.php"); 
		    break;
		case "nenweb" :
		    include("./mod/nenweb.php"); 
		    break;
		case "change_template" :
		    include("./mod/change_template.php"); 
		    break;
		case "module" :
		    include("./mod/module.php"); 
		    break;
		case "module_menu" :
		    include("./mod/module_menu.php"); 
		    break;
		case "module_menu_m" :
		    include("./mod/module_menu_m.php"); 
		    break;
		case "change_domain" :
		    include("./mod/domain.php"); 
		    break;
		case "change_popup" :
		    include("./mod/popup.php"); 
		    break;
		case "mobile_setup" :
		    include("./mod/mobile_setup.php"); 
		    break;
		case "google_analytics" :
		    include("./mod/google_analytics.php"); 
			  break;
		case "google_seo" :
		    include("./mod/google_seo.php"); 
		    break;
		case "create_sitemap" :
		    include("./mod/sitemap.php"); 
		    break;
		case "map" :
		    include("./mod/map.php"); 
		    break;
	}
?>
















