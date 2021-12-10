<div id="shoppingcolumn">
	<div class="head">
		<h2>お客様情報入力</h2>
	</div>
	<p>下記項目にご入力ください。<br>
	入力後、一番下の「確認ページへ」ボタンをクリックしてください。</p>
	<form name="form1" id="form1" method="post" action="">
        <input type="hidden" name="_csrfToken" autocomplete="off" value="<?= $this->request->getAttribute('csrfToken') ?>">
		<!-- <input type="hidden" name="mode" value="nonmember_confirm"> -->
		<!-- <input type="hidden" name="uniqid" value="61a9a707c7757LUdQg3R5"> -->
		<!-- <input type="hidden" name="transactionid" value="87dffe6cf99e055ca2fbe1edc8627acaec60a326"> -->
		<div class="nomenber_tb">	
            <table summary="お客様情報入力">
				<tbody><tr>
					<th width="150">お名前</th>
                    <th width="60"><span class="required">必須</span></th>
					<td>
						<span class="attention"></span>
						姓&nbsp;<input type="text" name="order_name01" value="" maxlength="50" style="" size="15" class="box120 nom_form" placeholder="山田">&nbsp;
						名&nbsp;<input type="text" name="order_name02" value="" maxlength="50" style="" size="15" class="box120 nom_form" placeholder="太郎">
					</td>
				</tr>
				<tr>
					<th>お名前（フリガナ）</th>
					<th><span class="required">必須</span></th>
                    <td>
						<span class="attention"></span>
						セイ&nbsp;<input type="text" name="order_kana01" value="" maxlength="50" style="" size="15" class="box120 nom_form" placeholder="ヤマダ">&nbsp;
						メイ&nbsp;<input type="text" name="order_kana02" value="" maxlength="50" style="" size="15" class="box120 nom_form" placeholder="タロウ">
					</td>
				</tr>
				<tr>
					<th>郵便番号</th>
					<th><span class="required">必須</span></th>
                    <td>
						<span class="attention"></span>
						<div class="yuubin">
                            〒&nbsp;<input type="text" name="order_zip01" value="" maxlength="3" style="" size="6" class="box60 nom_form" placeholder="123">&nbsp;-&nbsp;<input type="text" name="order_zip02" value="" maxlength="4" style="" size="6" class="box60 nom_form" placeholder="4567">
                            <span class="zipimg">
                                <a href="/address/index.php" onclick="fnCallAddress('/input_zip.php', 'order_zip01', 'order_zip02', 'order_pref', 'order_addr01'); return false;" target="_blank">
                                    <span class="zip_bt">住所自動入力</span>
                                </a>
                            </span>
						</div>
					</td>
				</tr>
				<tr>
					<th>住所</th>
					<th><span class="required">必須</span></th>
                    <td>
						<span class="attention"></span>
						<div class="custom-selectbox w30">
                            <select name="order_pref" style="" class="nom_form">
                                <option value="">都道府県を選択</option>
                                <option label="北海道" value="1">北海道</option>
                                <option label="青森県" value="2">青森県</option>
                                <option label="岩手県" value="3">岩手県</option>
                                <option label="宮城県" value="4">宮城県</option>
                                <option label="秋田県" value="5">秋田県</option>
                                <option label="山形県" value="6">山形県</option>
                                <option label="福島県" value="7" >福島県</option>
                                <option label="茨城県" value="8">茨城県</option>
                                <option label="栃木県" value="9">栃木県</option>
                                <option label="群馬県" value="10">群馬県</option>
                                <option label="埼玉県" value="11">埼玉県</option>
                                <option label="千葉県" value="12">千葉県</option>
                                <option label="東京都" value="13">東京都</option>
                                <option label="神奈川県" value="14">神奈川県</option>
                                <option label="新潟県" value="15">新潟県</option>
                                <option label="富山県" value="16">富山県</option>
                                <option label="石川県" value="17">石川県</option>
                                <option label="福井県" value="18">福井県</option>
                                <option label="山梨県" value="19">山梨県</option>
                                <option label="長野県" value="20">長野県</option>
                                <option label="岐阜県" value="21">岐阜県</option>
                                <option label="静岡県" value="22">静岡県</option>
                                <option label="愛知県" value="23">愛知県</option>
                                <option label="三重県" value="24">三重県</option>
                                <option label="滋賀県" value="25">滋賀県</option>
                                <option label="京都府" value="26">京都府</option>
                                <option label="大阪府" value="27">大阪府</option>
                                <option label="兵庫県" value="28">兵庫県</option>
                                <option label="奈良県" value="29">奈良県</option>
                                <option label="和歌山県" value="30">和歌山県</option>
                                <option label="鳥取県" value="31">鳥取県</option>
                                <option label="島根県" value="32">島根県</option>
                                <option label="岡山県" value="33">岡山県</option>
                                <option label="広島県" value="34">広島県</option>
                                <option label="山口県" value="35">山口県</option>
                                <option label="徳島県" value="36">徳島県</option>
                                <option label="香川県" value="37">香川県</option>
                                <option label="愛媛県" value="38">愛媛県</option>
                                <option label="高知県" value="39">高知県</option>
                                <option label="福岡県" value="40">福岡県</option>
                                <option label="佐賀県" value="41">佐賀県</option>
                                <option label="長崎県" value="42">長崎県</option>
                                <option label="熊本県" value="43">熊本県</option>
                                <option label="大分県" value="44">大分県</option>
                                <option label="宮崎県" value="45">宮崎県</option>
                                <option label="鹿児島県" value="46">鹿児島県</option>
                                <option label="沖縄県" value="47">沖縄県</option>

                            </select>
                        </div>
						<div class="mgt10">市区町村<br>
														<input type="text" name="order_addr01" placeholder="市区町村名（例：千代田区神田神保町）" value="" size="40" maxlength="50" style="" class="box380 nom_form"><br></div>
						<div class="mgt10">町名・番地・マンション名<br>
														<input type="text" name="order_addr02" value="" placeholder="番地・ビル名（例：1-3-5）" size="40" maxlength="50" style="" class="box380 nom_form"><br></div>
					</td>
				</tr>
				<tr>
					<th>電話番号</th>
					<th><span class="required">必須</span></th>
                    <td>
						<span class="attention"></span>
						<span class="attention"></span>
						<span class="attention"></span>
						<input type="text" name="order_tel01" value="" maxlength="6" style="" size="6" class="box60 nom_form" placeholder="090"> -
						<input type="text" name="order_tel02" value="" maxlength="6" style="" size="6" class="box60 nom_form" placeholder="1234"> -
						<input type="text" name="order_tel03" value="" maxlength="6" style="" size="6" class="box60 nom_form" placeholder="5678">
					</td>
				</tr>
				<tr>
					<th>FAX</th>
					<th><span class="any">任意</span></th>
                    <td>
						<span class="attention"></span>
						<span class="attention"></span>
						<span class="attention"></span>
						<input type="text" name="order_fax01" value="" maxlength="6" style="" size="6" class="box60 nom_form" placeholder="03"> -
						<input type="text" name="order_fax02" value="" maxlength="6" style="" size="6" class="box60 nom_form" placeholder="1234"> -
						<input type="text" name="order_fax03" value="" maxlength="6" style="" size="6" class="box60 nom_form" placeholder="5678">
					</td>
				</tr>
				<tr>
					<th>メールアドレス</th>
					<th><span class="required">必須</span></th>
                    <td>
						<span class="attention"></span>
						<input type="text" name="order_email" value="" maxlength="50" style="" size="40" class="box380 nom_form" placeholder="sample@example.com"><br>
						<span class="attention"></span>
						<input type="text" name="order_email_check" value="" maxlength="50" style="" size="40" class="box380 nom_form" placeholder="sample@example.com"><br>
						<p class="mini"><em>確認のため2度入力してください。</em></p>
					</td>
				</tr>
				<tr>
					<th>性別</th>
					
                    <th><span class="any">任意</span></th>
                    <td>
						<span class="attention"></span>
						<label for="order_sex_1"><input type="radio" name="order_sex" value="1" id="order_sex_1" style="">男性</label>
                        <label for="order_sex_2"><input type="radio" name="order_sex" value="2" id="order_sex_2" style="">女性</label>
					</td>
				</tr>
				<tr>
					<th>職業</th>
					<th><span class="any">任意</span></th>
                    <td>
																		<div class="custom-selectbox w50">
                            <select name="order_job" style="" class="nom_form">
                                <option value="">選択して下さい</option>
                                <option label="公務員" value="1">公務員</option>
                                <option label="コンサルタント" value="2">コンサルタント</option>
                                <option label="コンピュータ関連技術職" value="3">コンピュータ関連技術職</option>
                                <option label="コンピュータ関連以外の技術職" value="4">コンピュータ関連以外の技術職</option>
                                <option label="金融関係" value="5">金融関係</option>
                                <option label="医師" value="6">医師</option>
                                <option label="弁護士" value="7">弁護士</option>
                                <option label="総務・人事・事務" value="8">総務・人事・事務</option>
                                <option label="営業・販売" value="9">営業・販売</option>
                                <option label="研究・開発" value="10">研究・開発</option>
                                <option label="広報・宣伝" value="11">広報・宣伝</option>
                                <option label="企画・マーケティング" value="12">企画・マーケティング</option>
                                <option label="デザイン関係" value="13">デザイン関係</option>
                                <option label="会社経営・役員" value="14">会社経営・役員</option>
                                <option label="出版・マスコミ関係" value="15">出版・マスコミ関係</option>
                                <option label="学生・フリーター" value="16">学生・フリーター</option>
                                <option label="主婦" value="17">主婦</option>
                                <option label="その他" value="18">その他</option>

                            </select>
                        </div>
					</td>
				</tr>
				<tr>
					<th>生年月日</th>
					<th><span class="any">任意</span></th>
                    <td>
						<span class="attention"></span>
						<div class="custom-selectbox w15">
                            <select name="year" style="" class="nom_form">
                                <option label="1901" value="1901">1901</option>
                                <option label="1902" value="1902">1902</option>
                                <option label="1903" value="1903">1903</option>
                                <option label="1904" value="1904">1904</option>
                                <option label="1905" value="1905">1905</option>
                                <option label="1906" value="1906">1906</option>
                                <option label="1907" value="1907">1907</option>
                                <option label="1908" value="1908">1908</option>
                                <option label="1909" value="1909">1909</option>
                                <option label="1910" value="1910">1910</option>
                                <option label="1911" value="1911">1911</option>
                                <option label="1912" value="1912">1912</option>
                                <option label="1913" value="1913">1913</option>
                                <option label="1914" value="1914">1914</option>
                                <option label="1915" value="1915">1915</option>
                                <option label="1916" value="1916">1916</option>
                                <option label="1917" value="1917">1917</option>
                                <option label="1918" value="1918">1918</option>
                                <option label="1919" value="1919">1919</option>
                                <option label="1920" value="1920">1920</option>
                                <option label="1921" value="1921">1921</option>
                                <option label="1922" value="1922">1922</option>
                                <option label="1923" value="1923">1923</option>
                                <option label="1924" value="1924">1924</option>
                                <option label="1925" value="1925">1925</option>
                                <option label="1926" value="1926">1926</option>
                                <option label="1927" value="1927">1927</option>
                                <option label="1928" value="1928">1928</option>
                                <option label="1929" value="1929">1929</option>
                                <option label="1930" value="1930">1930</option>
                                <option label="1931" value="1931">1931</option>
                                <option label="1932" value="1932">1932</option>
                                <option label="1933" value="1933">1933</option>
                                <option label="1934" value="1934">1934</option>
                                <option label="1935" value="1935">1935</option>
                                <option label="1936" value="1936">1936</option>
                                <option label="1937" value="1937">1937</option>
                                <option label="1938" value="1938">1938</option>
                                <option label="1939" value="1939">1939</option>
                                <option label="1940" value="1940">1940</option>
                                <option label="1941" value="1941">1941</option>
                                <option label="1942" value="1942">1942</option>
                                <option label="1943" value="1943">1943</option>
                                <option label="1944" value="1944">1944</option>
                                <option label="1945" value="1945">1945</option>
                                <option label="1946" value="1946">1946</option>
                                <option label="1947" value="1947">1947</option>
                                <option label="1948" value="1948">1948</option>
                                <option label="1949" value="1949">1949</option>
                                <option label="1950" value="1950">1950</option>
                                <option label="----" value="----" selected="selected">----</option>
                                <option label="1951" value="1951">1951</option>
                                <option label="1952" value="1952">1952</option>
                                <option label="1953" value="1953">1953</option>
                                <option label="1954" value="1954">1954</option>
                                <option label="1955" value="1955">1955</option>
                                <option label="1956" value="1956">1956</option>
                                <option label="1957" value="1957">1957</option>
                                <option label="1958" value="1958">1958</option>
                                <option label="1959" value="1959">1959</option>
                                <option label="1960" value="1960">1960</option>
                                <option label="1961" value="1961">1961</option>
                                <option label="1962" value="1962">1962</option>
                                <option label="1963" value="1963">1963</option>
                                <option label="1964" value="1964">1964</option>
                                <option label="1965" value="1965">1965</option>
                                <option label="1966" value="1966">1966</option>
                                <option label="1967" value="1967">1967</option>
                                <option label="1968" value="1968">1968</option>
                                <option label="1969" value="1969">1969</option>
                                <option label="1970" value="1970">1970</option>
                                <option label="1971" value="1971">1971</option>
                                <option label="1972" value="1972">1972</option>
                                <option label="1973" value="1973">1973</option>
                                <option label="1974" value="1974">1974</option>
                                <option label="1975" value="1975">1975</option>
                                <option label="1976" value="1976">1976</option>
                                <option label="1977" value="1977">1977</option>
                                <option label="1978" value="1978">1978</option>
                                <option label="1979" value="1979">1979</option>
                                <option label="1980" value="1980">1980</option>
                                <option label="1981" value="1981">1981</option>
                                <option label="1982" value="1982">1982</option>
                                <option label="1983" value="1983">1983</option>
                                <option label="1984" value="1984">1984</option>
                                <option label="1985" value="1985">1985</option>
                                <option label="1986" value="1986">1986</option>
                                <option label="1987" value="1987">1987</option>
                                <option label="1988" value="1988">1988</option>
                                <option label="1989" value="1989">1989</option>
                                <option label="1990" value="1990">1990</option>
                                <option label="1991" value="1991">1991</option>
                                <option label="1992" value="1992">1992</option>
                                <option label="1993" value="1993">1993</option>
                                <option label="1994" value="1994">1994</option>
                                <option label="1995" value="1995">1995</option>
                                <option label="1996" value="1996">1996</option>
                                <option label="1997" value="1997">1997</option>
                                <option label="1998" value="1998">1998</option>
                                <option label="1999" value="1999">1999</option>
                                <option label="2000" value="2000">2000</option>
                                <option label="2001" value="2001">2001</option>
                                <option label="2002" value="2002">2002</option>
                                <option label="2003" value="2003">2003</option>
                                <option label="2004" value="2004">2004</option>
                                <option label="2005" value="2005">2005</option>
                                <option label="2006" value="2006">2006</option>
                                <option label="2007" value="2007">2007</option>
                                <option label="2008" value="2008">2008</option>
                                <option label="2009" value="2009">2009</option>
                                <option label="2010" value="2010">2010</option>
                                <option label="2011" value="2011">2011</option>
                                <option label="2012" value="2012">2012</option>
                                <option label="2013" value="2013">2013</option>
                                <option label="2014" value="2014">2014</option>
                                <option label="2015" value="2015">2015</option>
                                <option label="2016" value="2016">2016</option>
                                <option label="2017" value="2017">2017</option>
                                <option label="2018" value="2018">2018</option>
                                <option label="2019" value="2019">2019</option>
                                <option label="2020" value="2020">2020</option>
                                <option label="2021" value="2021">2021</option>
                                <option label="2022" value="2022">2022</option>
                                <option label="2023" value="2023">2023</option>
                                <option label="2024" value="2024">2024</option>

                            </select>
                        </div>
                        <span>年</span>
						<div class="custom-selectbox w10">
                            <select name="month" style="" class="nom_form">
                                <option value="">--</option>
                                <option label="1" value="1">1</option>
                                <option label="2" value="2">2</option>
                                <option label="3" value="3">3</option>
                                <option label="4" value="4">4</option>
                                <option label="5" value="5">5</option>
                                <option label="6" value="6">6</option>
                                <option label="7" value="7">7</option>
                                <option label="8" value="8">8</option>
                                <option label="9" value="9">9</option>
                                <option label="10" value="10">10</option>
                                <option label="11" value="11">11</option>
                                <option label="12" value="12">12</option>

                            </select>
                        </div>
                        <span>月</span>
						<div class="custom-selectbox w10">
                            <select name="day" style="" class="nom_form">
                                <option value="">--</option>
                                <option label="1" value="1">1</option>
                                <option label="2" value="2">2</option>
                                <option label="3" value="3">3</option>
                                <option label="4" value="4">4</option>
                                <option label="5" value="5">5</option>
                                <option label="6" value="6">6</option>
                                <option label="7" value="7">7</option>
                                <option label="8" value="8">8</option>
                                <option label="9" value="9">9</option>
                                <option label="10" value="10">10</option>
                                <option label="11" value="11">11</option>
                                <option label="12" value="12">12</option>
                                <option label="13" value="13">13</option>
                                <option label="14" value="14">14</option>
                                <option label="15" value="15">15</option>
                                <option label="16" value="16">16</option>
                                <option label="17" value="17">17</option>
                                <option label="18" value="18">18</option>
                                <option label="19" value="19">19</option>
                                <option label="20" value="20">20</option>
                                <option label="21" value="21">21</option>
                                <option label="22" value="22">22</option>
                                <option label="23" value="23">23</option>
                                <option label="24" value="24">24</option>
                                <option label="25" value="25">25</option>
                                <option label="26" value="26">26</option>
                                <option label="27" value="27">27</option>
                                <option label="28" value="28">28</option>
                                <option label="29" value="29">29</option>
                                <option label="30" value="30">30</option>
                                <option label="31" value="31">31</option>

                            </select>
                        </div>
                        <span>日</span>
					</td>
				</tr>
             </tbody></table>
           </div>
                
                <div class="deliv_sitei"> 
                	<div class="btn_nomenber">						
                        <input type="checkbox" name="deliv_check" value="1" onclick="fnCheckInputDeliv();" id="deliv_label">
						<label for="deliv_label">別の配送先を指定する</label>
                    </div>
                    <p class="txt_center">※上記と同じご住所に送る場合は<b>不要</b>です。</p>
                
               <div id="diss" class="another_deliv" style="display:none;"> 
                <table>
                    <tbody><tr>
                        <th width="150">お名前</th>
                        <th width="60"><span class="required">必須</span></th>
                        <td>
                            <span class="attention"></span>
                            姓&nbsp;<input type="text" name="deliv_name01" value="渡邊" maxlength="50" style="background-color: rgb(221, 221, 221);" size="15" class="box120" placeholder="山田" disabled="">&nbsp;
                            名&nbsp;<input type="text" name="deliv_name02" value="良太" maxlength="50" style="background-color: rgb(221, 221, 221);" size="15" class="box120" placeholder="太郎" disabled="">
                        </td>
                    </tr>
                    <tr>
                        <th>お名前（フリガナ）</th>
                        <th><span class="required">必須</span></th>
                        <td>
                            <span class="attention"></span>
                            セイ&nbsp;<input type="text" name="deliv_kana01" value="ワタナベ" maxlength="50" style="background-color: rgb(221, 221, 221);" size="15" class="box120" placeholder="ヤマダ" disabled="">&nbsp;
                            メイ&nbsp;<input type="text" name="deliv_kana02" value="リョウタ" maxlength="50" style="background-color: rgb(221, 221, 221);" size="15" class="box120" placeholder="タロウ" disabled="">
                        </td>
                    </tr>
                    <tr>
                        <th>郵便番号</th>
                        <th><span class="required">必須</span></th>
                        <td>
                            <span class="attention"></span>
                            <div class="yuubin">
                                〒&nbsp;<input type="text" name="deliv_zip01" value="961" maxlength="3" style="background-color: rgb(221, 221, 221);" size="6" class="box60" placeholder="123" disabled="">&nbsp;-&nbsp;<input type="text" name="deliv_zip02" value="0308" maxlength="4" style="background-color: rgb(221, 221, 221);" size="6" class="box60" placeholder="4567" disabled="">
                                 <span class="zipimg">
                                    <a href="/address/index.php" onclick="fnCallAddress('/input_zip.php', 'deliv_zip01', 'deliv_zip02', 'deliv_pref', 'deliv_addr01'); return false;" target="_blank">
                                        <span class="zip_bt">住所自動入力</span>
                                    </a>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>住所</th>
                        <th><span class="required">必須</span></th>
                        <td>
                                                        <span class="attention"></span>
                            <div class="custom-selectbox w30">
                                <select name="deliv_pref" style="background-color: rgb(221, 221, 221);" disabled="">
                                    <option value="">都道府県を選択</option>
                                    <option label="北海道" value="1">北海道</option>
                                    <option label="青森県" value="2">青森県</option>
                                    <option label="岩手県" value="3">岩手県</option>
                                    <option label="宮城県" value="4">宮城県</option>
                                    <option label="秋田県" value="5">秋田県</option>
                                    <option label="山形県" value="6">山形県</option>
                                    <option label="福島県" value="7" selected="selected">福島県</option>
                                    <option label="茨城県" value="8">茨城県</option>
                                    <option label="栃木県" value="9">栃木県</option>
                                    <option label="群馬県" value="10">群馬県</option>
                                    <option label="埼玉県" value="11">埼玉県</option>
                                    <option label="千葉県" value="12">千葉県</option>
                                    <option label="東京都" value="13">東京都</option>
                                    <option label="神奈川県" value="14">神奈川県</option>
                                    <option label="新潟県" value="15">新潟県</option>
                                    <option label="富山県" value="16">富山県</option>
                                    <option label="石川県" value="17">石川県</option>
                                    <option label="福井県" value="18">福井県</option>
                                    <option label="山梨県" value="19">山梨県</option>
                                    <option label="長野県" value="20">長野県</option>
                                    <option label="岐阜県" value="21">岐阜県</option>
                                    <option label="静岡県" value="22">静岡県</option>
                                    <option label="愛知県" value="23">愛知県</option>
                                    <option label="三重県" value="24">三重県</option>
                                    <option label="滋賀県" value="25">滋賀県</option>
                                    <option label="京都府" value="26">京都府</option>
                                    <option label="大阪府" value="27">大阪府</option>
                                    <option label="兵庫県" value="28">兵庫県</option>
                                    <option label="奈良県" value="29">奈良県</option>
                                    <option label="和歌山県" value="30">和歌山県</option>
                                    <option label="鳥取県" value="31">鳥取県</option>
                                    <option label="島根県" value="32">島根県</option>
                                    <option label="岡山県" value="33">岡山県</option>
                                    <option label="広島県" value="34">広島県</option>
                                    <option label="山口県" value="35">山口県</option>
                                    <option label="徳島県" value="36">徳島県</option>
                                    <option label="香川県" value="37">香川県</option>
                                    <option label="愛媛県" value="38">愛媛県</option>
                                    <option label="高知県" value="39">高知県</option>
                                    <option label="福岡県" value="40">福岡県</option>
                                    <option label="佐賀県" value="41">佐賀県</option>
                                    <option label="長崎県" value="42">長崎県</option>
                                    <option label="熊本県" value="43">熊本県</option>
                                    <option label="大分県" value="44">大分県</option>
                                    <option label="宮崎県" value="45">宮崎県</option>
                                    <option label="鹿児島県" value="46">鹿児島県</option>
                                    <option label="沖縄県" value="47">沖縄県</option>

                                </select>
                            </div>
                            <div class="mgt10">市区町村・町名<br>
                                                                <input type="text" name="deliv_addr01" placeholder="市区町村名（例：千代田区神田神保町）" value="白河市東蕪内" size="40" maxlength="50" style="background-color: rgb(221, 221, 221);" class="box380" disabled=""><br>
                            </div>
                            <div class="mgt10">番地・マンション名<br>
                                                                <input type="text" name="deliv_addr02" placeholder="番地・ビル名（例：1-3-5）" value="80" size="40" maxlength="50" style="background-color: rgb(221, 221, 221);" class="box380" disabled=""><br>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>電話番号</th>
                        <th><span class="required">必須</span></th>
                        <td>
                                                                                                                <span class="attention"></span>
                            <span class="attention"></span>
                            <span class="attention"></span>
                            <input type="text" name="deliv_tel01" value="080" maxlength="6" style="background-color: rgb(221, 221, 221);" size="6" class="box60" placeholder="090" disabled=""> -
                            <input type="text" name="deliv_tel02" value="6038" maxlength="6" style="background-color: rgb(221, 221, 221);" size="6" class="box60" placeholder="1234" disabled=""> -
                            <input type="text" name="deliv_tel03" value="8627" maxlength="6" style="background-color: rgb(221, 221, 221);" size="6" class="box60" placeholder="5678" disabled="">
                        </td>
                    </tr>
				</tbody></table>
            </div>
        </div>

		
		<ul class="btn_area_l2">
			<li class="btn">
				<span class="btn_next">
					<a href="javascript:void(0);" onclick="document.form1.submit();">次のページへ<input type="hidden" name="next" id="next"></a>
				</span>
			</li>
		</ul>
		

	</form>
</div>