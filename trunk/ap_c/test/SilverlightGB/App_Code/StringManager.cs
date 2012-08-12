using System;
using System.Web.Security;
using System.Text.RegularExpressions;

namespace _211
{
	/// <summary>
	/// StringManager 的摘要说明。
	/// </summary>
	public class StringManager
	{
		public StringManager()
		{
			//
			// TODO: 在此处添加构造函数逻辑
			//
		}

		public static string LoginLetterSelected(string key)
		{
			return key.Trim().Replace("%","").Replace("'","").Replace("-","");
		}

		public static string String2MD5(string key)
		{
			return FormsAuthentication.HashPasswordForStoringInConfigFile(key,"md5").Substring(8,16).ToLower();
		}

		public static string StringSelected(string key)
		{
			return key.Trim().Replace("%","&#37;").Replace("'","&#39;").Replace("-","&#45;");
		}

		public static string StringBackSelected(string key)
		{
			return key.Trim().Replace("&#37;","%").Replace("&#39;","'").Replace("&#45;","-");
		}

		public static string StringCut(string key,int cou)
		{
			if(key.Length>cou)
			{
				return key.Substring(0,cou-1)+"...";
			}
			else
			{
				return key;
			}
		}

		public static string TimeMessage(string key)
		{
			if(key.IndexOf(" ")>0)
			{
				return key.Substring(0,key.IndexOf(" "));
			}
			else
			{
				return key;
			}
		}

		public static bool IsUInt(string key)
		{
			if(Regex.IsMatch(key,@"^([\d])+$"))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
}
