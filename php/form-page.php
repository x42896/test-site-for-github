<h2>Оставьте заявку</h2>
<form action="/config/submit.php" method="post">
   <label>Ваше имя: <input type="text" name="name" required></label><br><br>
   <label>Возраст: <input type="number" name="age" required></label><br><br>
   <label>Курс:
       <select name="course">
           <option>Roblox</option>
           <option>Веб-разработка</option>
           <option>Python</option>
       </select>
   </label><br><br>
   <button type="submit">Отправить заявку</button>
</form>