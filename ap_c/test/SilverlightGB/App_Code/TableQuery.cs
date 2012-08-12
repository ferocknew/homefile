using System;
using System.Data;

namespace _211
{
	/// <summary>
	/// TableQuery 的摘要说明。
	/// </summary>
	public sealed class TableQuery
	{
		
        public static DataTable CommentQuery(int pagesize, int page, string IID)
        {
            string[] col ={ "Comment.commentid", "Comment.commenttype", "Comment.commentparentid", "Comment.commentuser", "Comment.commenttext", "Comment.commentreply", "Comment.commentdate", "Comment.commentip" };
            string[] cod ={ "Comment.commentparentid=" + IID};

            return DBQuery.OpenTable("Comment", col, cod, "commentid", false, pagesize, page);
        }

	
	}
}
