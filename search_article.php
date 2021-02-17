<div style="text-align:center; padding:20px 0 0 0;">

<form action="do_search_article.php" method="GET" autocomplete="off">

<select name="term" style="font-size: 20px;">
    <option value="ALL">전체기간</option>
    <option value="1 DAY">1일</option>
    <option value="1 WEEK">1주</option>
    <option value="1 MONTH">1개월</option>
    <option value="6 MONTH">6개월</option>
	<option value="1 YEAR">1년</option>
</select>&nbsp;

<select name="condition" style="font-size: 20px;">
    <option value="title&body">제목+내용</option>
    <option value="title">제목</option>
    <option value="writer">작성자</option>
</select>

<input name="keyword" type="text" style="font-size: 20px;  width:300px;"/> &nbsp;
<button>검색</button>
	
</form>

</div>