# TDP4 Weapon Prices
An API written in PHP to get TDP4 weapon prices.<br>
### Parameters:
| Parameter Name| Value         | Description                              |
| ------------- |:-------------:| ---------------------------------------- | 
| weapon        | string        | specify the weapon name                  |
| discount      | int           |   (optional) specify a discounted amount |
### Example
<code>
<a href="http://www.alphaoverall.com/api/tdp4/weaponprices.php?weapon=colt&discount=50">
http://www.alphaoverall.com/api/tdp4/weaponprices.php?weapon=colt&discount=50
</a>
</code>
returns
```json
{
  "result": "The cost of Colt King Cobra is 500 coins with 50% discount",
  "coins": 500,
  "cash": 0
}
```
If a weapon doesn't exist:
```json
{
  "error": "No weapon named 'cold'"
}
```
Use freely.
Created by [AlphaOverall](http://www.kongregate.com/accounts/AlphaOverall)
<input type="hidden" value="https://repl.it/BbYs used this for conversion between js and php arrays, mostly worked">
