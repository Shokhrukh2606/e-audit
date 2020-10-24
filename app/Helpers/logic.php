<?
use App\Models\Template;
function custom_fields($id){
	return json_decode(Template::where('id', $id)->first()->fields);
}

?>