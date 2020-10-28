輸出結果是  
2  
2  
undefined  

obj.inner.hello() => obj.inner.hello.call(obj.inner)
this 指的是 inner，所以 console.log(this.value) 就會印出2  

obj2.hello() => obj2.hello.call(obj2) => obj2.hello.call(obj.inner)  
跟上面一樣，會印出2  

hello() =>　hello.call(undefined)  
this 的值跟 function 怎麼被呼叫有關。