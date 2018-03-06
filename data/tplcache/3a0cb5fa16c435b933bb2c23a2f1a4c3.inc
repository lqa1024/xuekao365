<li>
     [field:array runphp='yes']@me = (empty(@me['litpic']) ? "" : "<a href='{@me['arcurl']}' class='preview'><img src='{@me['litpic']}'/></a>"); [/field:array]
      <span>[field:pubdate function="MyDate('m-d',@me)"/]</span><a href="[field:arcurl/]">[field:title/]</a></li>