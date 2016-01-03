# TDP4 Gun Prices
An API written in PHP to get TDP4 weapon prices. Built based off of [DPBot](http://www.kongregate.com/accounts/DPBot) code, so usage takes in a message in the form <br>`how much is weapon [with 50% discount]` or <br>`what is the cost of weapon`<br>(both have variations in regex) and returns an answer. Usage here:<br>
<code><a href="http://www.alphaoverall.com/api/tdp4prices.php?message=how%20much%20is%20colt%20with%2050%%20discount">
http://www.alphaoverall.com/api/tdp4prices.php?message=how%20much%20is%20colt%20with%2050%%20discount
</a>
</code>
returns
```json
{
  "result": "The cost of Colt King Cobra is 500 coins with 50% discount"
}
```
A message which doesn't follow the guidelines will return
```json
{
  "error": "No result for 'message with nothing'"
}
```
Use freely.
Created by [AlphaOverall](www.kongregate.com/accounts/AlphaOverall)
