## 請找出三個課程裡面沒提到的 HTML 標籤並一一說明作用。

1. `<hr />` 說明：定義一個水平的分隔線
2. `<u />` 說明：為文字內容加上底線
3. `<dl>` 說明:可以定義一個列表中的詳情，跟 `<dt>` 還有 `<dd>` 一起搭配使用

## 請問什麼是盒模型（box modal）

CSS 盒模型由content (內容) + padding (內邊距) + border (邊框) + margin (外邊距) 所  
組成，以上全部加起來，決定了一個元素的寬跟高，也能選擇用 boder-box 的 CSS 屬性  
，使元素的寬高取決於 content 的寬高。

## 請問 display: inline, block 跟 inline-block 的差別是什麼？

* block ：元素的 display 屬性被標示為 block 時，元素就被稱為「區塊元素」，  
          區塊元素的排列會從新的一行開始顯示，然後盡可能的撐滿父元素。  

* inline：元素的 display 屬性被標示為 inline 時，元素就被稱為「行內元素」，
          顧名思義可以在 block 行內被顯示，不能指定寬高，只能設定左右外距。  

* inline-block：排列方式以 inline 的方式呈現，但同時擁有 block 可以設定上下外距的優點。

## 請問 position: static, relative, absolute 跟 fixed 的差別是什麼？

* static：沒有定位，元素就依正常的排列顯示

* relative︰透過方向的設置來移動該元素相對於其原本位置來進行定位

* absolute：用父元素來當作基準定位，但父元素的屬性不能是 static

* fixed：以瀏覽器當作基準來定位

