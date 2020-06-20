function capitalize (str) {
  let result = ''
	for (let i=1; i<str.length; i++) {
		result += str[i]
	}
	return str[0].toUpperCase() + result
}

console.log(capitalize('hello'));
