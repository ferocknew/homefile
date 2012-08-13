class NewsModel {
	private var id:Number;
	private var title:String;
	private var content:String;
	public function setID(id:Number) 
	{
		this.id=id;
	}
	public function getID():Number
	{
		return this.id;
	}
	public function setTitle(title:String) 
	{
		this.title=title;
	}
	public function getTitle():String  
	{
		return this.title;
	}
	public function setContent(content:String ) 
	{
		this.content=content;
		
	}
	public function getContent():String 
	{
		return this.content;
	}
}