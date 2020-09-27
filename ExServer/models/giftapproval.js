var db = require('./db');

module.exports =
{
	getResult:(user,callback)=>{
		var sql= "select * from giftapproval where username='"+user+"' ";
		console.log(sql);
		db.getResults(sql, null,(result)=>{
			//console.log(result[0]);
			if(result.length>0)
			{
				//user.role=result[0].role;
				callback(result);
			}
			else{
				callback([]);
			}
		});
	},
}