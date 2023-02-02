// for page 1 -
function reset() {
  document.getElementById('fileInput').value = ''
}

// for page 3 -
pTagId = document.getElementById('finalContent');

// const params = (new URL(document.location)).searchParams;

document.getElementById('fileInput').onchange = function() {

  var file = this.files[0];

  var reader = new FileReader();
  reader.onload = function(progressEvent) {

    let str = this.result;

    $(".btn1").click(function() {
      // readTextFile("file:///C:/Users/Dell/Desktop/EDU/SEM5/IWP/J COMP/file11.txt");
      var search = '==';
      var final = '.eqauls(';

      str = str.replace(search, final);

      pTagId.innerHTML = str;
      // window.location.href = "third_page.html";
    })

    $(".btn2").click(function() {
      var search = '+=';
      var final = '.append(';
      console.log(str);
      str = str.replace(search, final);

      var for_pos = indexes(str, "for");
      console.log(for_pos);
      var violation_pos = indexes(str, ".append")
      console.log(violation_pos);

      temp = stringBuilder_placer(str, for_pos, violation_pos);
      console.log(temp);
      pTagId.innerHTML = str
    })

    $(".btn3").click(function() {
      console.log(str);
      var newLine_pos = indexes(str, '\n');
      var new_pos = indexes(str, 'new');
      var for_pos = indexes(str, 'for');
      var open_brack_pos = indexes(str, '{');
      var close_brack_pos = indexes(str, '}');
      var reversed_close_brack = close_brack_pos.reverse();

      var nearest_open = closest_stuff(open_brack_pos, for_pos);
      var nearest_close = closest_stuff(reversed_close_brack, for_pos);
      var nearest_start_new = closest_stuff(newLine_pos, new_pos);
      nearest_start_new = newLine_pos[newLine_pos.indexOf(nearest_start_new) - 1];
      var nearest_end_new = newLine_pos[newLine_pos.indexOf(nearest_start_new) + 1];
      const reqd_error = str.slice(nearest_start_new, nearest_end_new);
      str = str.replace(reqd_error, '');
      str = str.substring(0, for_pos[0]) + reqd_error + " // correction done here" + '\n' + '\t\t' + str.substring(for_pos[0], str.length);
      console.log(str);
      pTagId.innerHTML = str;
    })
  };
  reader.readAsText(file);
};

function closest_stuff(lst1, lst2) {
  const res = [];
  for (let i = 0; i < lst1.length; i++) {
    if (lst1[i] < lst2[0]) {
      continue;
    };
    res.push(lst1[i]);
  };
  return (Math.min.apply(Math, res));
}

function stringBuilder_placer(data, for_pos, violation_pos) {
  var req = [];
  for (let i = 0; i < for_pos.length; i++) {
    if (for_pos[i] < violation_pos[0]) {
      req.push(i);
    }
  }
  for (var i in req) {
    data = data.substring(0, for_pos[0]) + "StringBuffer result = new StringBuffer('hello'); // error correction done here\n" + data.substring(for_pos[0], data.length);
  }
  return data;
}

function indexes(source, find) {
  if (!source) {
    return [];
  }
  if (!find) {
    return source.split('').map(function(_, i) {
      return i;
    });
  }
  var result = [];
  for (i = 0; i < source.length; ++i) {
    if (source.substring(i, i + find.length) == find) {
      result.push(i - 1);
    }
  }
  return result;
}

function readTextFile(file)
{
    var rawFile = new XMLHttpRequest();
    rawFile.open("GET", file, false);
    rawFile.onreadystatechange = function ()
    {
        if(rawFile.readyState === 4)
        {
            if(rawFile.status === 200 || rawFile.status == 0)
            {
                var allText = rawFile.responseText;
                alert(allText);
            }
        }
    }
    rawFile.send(null);
}
