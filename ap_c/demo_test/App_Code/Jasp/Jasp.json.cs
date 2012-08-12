using System;
using System.Collections.Generic;
using System.Text;
using System.Text.RegularExpressions;
using System.Collections;

namespace Jasp
{

    /// <summary>
    /// 类  名：json
    /// 描  述：JSON解析类
    /// 编  写：Jonah
    /// 日  期：2010-01-06
    /// 版  本：1.1.0
    /// </summary>
    public static class json
    {
        #region 全局变量
        private static jsonObj _json = new jsonObj();//寄存器
        private static readonly string _SEMICOLON = "@semicolon";//分号转义符
        private static readonly string _COMMA = "@comma"; //逗号转义符
        #endregion
        #region 字符串转义
        /// <summary>
        /// 字符串转义,将双引号内的:和,分别转成_SEMICOLON和_COMMA
        /// </summary>
        /// <param name="text"></param>
        /// <returns></returns>
        private static object StrEncode(object text)
        {
            MatchCollection matches = Regex.Matches(text.ToString(), "\\\"[^\\\"]+\\\"");
            foreach (Match match in matches)
            {
                text = text.ToString().Replace(match.Value, match.Value.Replace(":", _SEMICOLON).Replace(",", _COMMA));
            }
            return text;
        }
        public static string CharacterToCoding(object input)
        {
            //int[] aL1 = new int[] { 34, 92, 47, 8, 12, 10, 13, 9 };
            //int[] aL2 = new int[] { 34, 92, 47, 98, 102, 110, 114, 116 };
            //bool p_1 = true;
            //System.Text.StringBuilder sb = new System.Text.StringBuilder();
            //foreach (char s in ((string)input).ToCharArray())
            //{
            //    p_1 = true;
            //    for (int j = 0; j < 7; j++)
            //    {
            //        if (s == Convert.ToChar(aL1[j]))
            //        {
            //            sb.Append("\\" + Convert.ToChar(aL2[j]));
            //            p_1 = false;
            //        }
            //    }
            //    if (p_1)
            //    {
            //        int text_d;
            //        text_d = (int)s;
            //        if (text_d > 31 && text_d < 127) { sb.Append(s); }
            //        else if (text_d > -1 || text_d < 65535)
            //        {

            //            sb.Append("\\u" + ((int)s).ToString("X4"));
            //        }
            //    }
            //}
            //return sb.ToString();


            StringBuilder haystack = new StringBuilder();
            Hashtable charmap = new Hashtable();
            charmap.Add("8","\\b");
            charmap.Add("9", "\\t");
            charmap.Add("10", "\\n");
            charmap.Add("12", "\\f");
            charmap.Add("13", "\\r");
            charmap.Add("34", "\\\"");
            charmap.Add("47", "\\/");
            charmap.Add("92", "\\\\");
            int charcode;
            char[] arr = ((string)input).ToCharArray();
            int strlen = arr.Length;
            for (int i = 0; i < strlen; i++)
            {
                string obj =arr[i].ToString();
                charcode = ((int)arr[i]);
                if (charcode < 127)
                {
                    if (!string.IsNullOrEmpty(charmap[charcode+""]+""))
                    {
                        obj = charmap[charcode + ""] + "";
                    }
                    else if (charcode < 32)
                    {
                        obj = "\\u" + Convert.ToString(charcode, 16).PadLeft(4, '0');
                    }
                }
                else
                {
                    obj = "\\u" + Convert.ToString(charcode, 16).PadLeft(4, '0');
                }
                haystack.Append(obj);
            }
            return  haystack.ToString();
        }

        /// <summary>
        /// 字符串转义,将_SEMICOLON和_COMMA分别转成:和,
        /// </summary>
        /// <param name="text"></param>
        /// <returns></returns>
        private static string StrDecode(string text)
        {
            return text.Replace("/", "\\/");
        }

        #endregion

        #region JSON最小单元解析

        /// <summary>
        /// 最小对象转为JSONObject
        /// </summary>
        /// <param name="text"></param>
        /// <returns></returns>
        private static jsonObj DeserializeSingletonObject(object text)
        {
            jsonObj jsonObject = new jsonObj();

            MatchCollection matches = Regex.Matches((string)text, "(\\\"(?<key>[^\\\"]+)\\\":\\\"(?<value>[^,\\\"]+)\\\")|(\\\"(?<key>[^\\\"]+)\\\":(?<value>[^,\\\"\\}]+))");
            foreach (Match match in matches)
            {
                string value = match.Groups["value"].Value;
                jsonObject.Add(match.Groups["key"].Value, _json.ContainsKey(value) ? _json[value] : StrDecode(value));
            }

            return jsonObject;
        }

        /// <summary>
        /// 最小数组转为JSONArray
        /// </summary>
        /// <param name="text"></param>
        /// <returns></returns>
        private static jsonAry DeserializeSingletonArray(object text)
        {
            jsonAry jsonArray = new jsonAry();

            MatchCollection matches = Regex.Matches((string)text, "(\\\"(?<value>[^,\\\"]+)\")|(?<value>[^,\\[\\]]+)");
            foreach (Match match in matches)
            {
                string value = match.Groups["value"].Value;
                jsonArray.Add(_json.ContainsKey(value) ? _json[value] : StrDecode(value));
            }

            return jsonArray;
        }

        /// <summary>
        /// 反序列化
        /// </summary>
        /// <param name="text"></param>
        /// <returns></returns>
        private static object Deserialize(object text)
        {
            text = StrEncode(text);//转义;和,

            int count = 0;
            string key = string.Empty;
            string pattern = "(\\{[^\\[\\]\\{\\}]+\\})|(\\[[^\\[\\]\\{\\}]+\\])";

            while (Regex.IsMatch((string)text, pattern))
            {
                MatchCollection matches = Regex.Matches((string)text, pattern);
                foreach (Match match in matches)
                {
                    key = "___key" + count + "___";

                    if (match.Value.Substring(0, 1) == "{")
                        _json.Add(key, DeserializeSingletonObject(match.Value));
                    else
                        _json.Add(key, DeserializeSingletonArray(match.Value));

                    text = text.ToString().Replace(match.Value, key);

                    count++;
                }
            }
            return text;
        }

        #endregion

        #region 公共接口

        /// <summary>
        /// 序列化JSONObject对象
        /// </summary>
        /// <param name="text"></param>
        /// <returns></returns>
        public static jsonObj DeserializeObject(object text)
        {
            return _json[Deserialize(text)] as jsonObj;
        }

        /// <summary>
        /// 序列化JSONArray对象
        /// </summary>
        /// <param name="text"></param>
        /// <returns></returns>
        public static jsonAry DeserializeArray(object text)
        {
            return _json[Deserialize(text)] as jsonAry;
        }

        /// <summary>
        /// 反序列化JSONObject对象
        /// </summary>
        /// <param name="jsonObject"></param>
        /// <returns></returns>
        public static string SerializeObject(jsonObj jsonObject)
        {
            StringBuilder sb = new StringBuilder();
            sb.Append("{");
            foreach (KeyValuePair<object, object> kvp in jsonObject)
            {
                Type _t=kvp.Value.GetType();
                switch (_t.Name) {
                    case "jsonAry":
                        sb.Append(string.Format("\"{0}\":{1},", kvp.Key, SerializeArray((jsonAry)kvp.Value)));
                        break;
                    case "jsonObj":
                        sb.Append(string.Format("\"{0}\":{1},", kvp.Key, SerializeObject((jsonObj)kvp.Value)));
                        break;
                    case "Int32":
                        sb.Append(string.Format("\"{0}\":{1},", kvp.Key, kvp.Value.ToString()));
                        break;
                    case "Boolean":
                        sb.Append(string.Format("\"{0}\":{1},", kvp.Key, kvp.Value.ToString()).ToLower());
                        break;
                    case "String":
                        try {
                            DateTime _dt = Convert.ToDateTime(kvp.Value);                            
                            string _dtString=string.Format("{0} {1}", _dt.ToString("R"), _dt.ToString("UTC zz00"));
                            sb.Append(string.Format("\"{0}\":\"{1}\",", kvp.Key, _dt.ToUniversalTime()));
                            //Thu Mar 24 17:23:12 UTC+0800 2011
                        }
                        catch {
                            sb.Append(string.Format("\"{0}\":\"{1}\",", kvp.Key, CharacterToCoding(kvp.Value.ToString())));
                        }
                        
                        break;
                    default:
                        break;
                    
                }
                /*
                if (kvp.Value is jsonObj)
                {
                    sb.Append(string.Format("\"{0}\":{1},", kvp.Key, SerializeObject((jsonObj)kvp.Value)));
                }
                else if (kvp.Value is jsonAry)
                {
                    sb.Append(string.Format("\"{0}\":{1},", kvp.Key, SerializeArray((jsonAry)kvp.Value)));
                }
                else if (kvp.Value is Object)
                {
                    if (kvp.Value is Int32)
                    {
                        sb.Append(string.Format("\"{0}\":{1},", kvp.Key, CharacterToCoding(kvp.Value.ToString())));
                    }
                    else if (kvp.Value is Boolean)
                    {
                        sb.Append(string.Format("\"{0}\":{1},", kvp.Key, CharacterToCoding(kvp.Value.ToString()).ToLower()));
                    }
                    else {
                        sb.Append(string.Format("\"{0}\":\"{1}\",", kvp.Key, CharacterToCoding(kvp.Value.ToString())));                    
                    }
                }
                else
                {
                    sb.Append(string.Format("\"{0}\":\"{1}\",", kvp.Key, ""));
                }*/
            }
            if (sb.Length > 1)
                sb.Remove(sb.Length - 1, 1);
            sb.Append("}");
            return sb.ToString();
        }

        /// <summary>
        /// 反序列化JSONArray对象
        /// </summary>
        /// <param name="jsonArray"></param>
        /// <returns></returns>
        public static string SerializeArray(jsonAry jsonArray)
        {
            StringBuilder sb = new StringBuilder();
            sb.Append("[");
            for (int i = 0; i < jsonArray.Count; i++)
            {
                if (jsonArray[i] is jsonObj)
                {
                    sb.Append(string.Format("{0},", SerializeObject((jsonObj)jsonArray[i])));
                }
                else if (jsonArray[i] is jsonAry)
                {
                    sb.Append(string.Format("{0},", SerializeArray((jsonAry)jsonArray[i])));
                }
                else if (jsonArray[i] is Object)
                {
                    if (jsonArray[i] is Int32)
                    {
                        sb.Append(string.Format("{0},", CharacterToCoding(jsonArray[i].ToString())));
                    }
                    else
                    {
                        sb.Append(string.Format("\"{0}\",", CharacterToCoding(jsonArray[i].ToString())));
                    }
                }
                else
                {
                    sb.Append(string.Format("\"{0}\",", ""));
                }

            }
            if (sb.Length > 1)
                sb.Remove(sb.Length - 1, 1);
            sb.Append("]");
            return sb.ToString();
        }
        #endregion
    }

    /// <summary>
    /// 类  名：JSONObject
    /// 描  述：JSON对象类
    /// 编  写：Jonah
    /// 日  期：2010-01-06
    /// 版  本：1.1.0
    /// 更新历史：
    ///     2010-01-06  继承Dictionary<TKey, TValue>代替this[]
    /// </summary>
    public class jsonObj : Dictionary<object, object>
    { }

    /// <summary>
    /// 类  名：JSONArray
    /// 描  述：JSON数组类
    /// 编  写：Jonah
    /// 日  期：2010-01-06
    /// 版  本：1.1.0
    /// 更新历史：
    ///     2010-01-06  继承List<T>代替this[]
    /// </summary>
    public class jsonAry : List<object>
    { }

}

