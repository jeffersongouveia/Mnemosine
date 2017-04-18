class Password {

	generate(length, options) {
		let chars = [
            [options[0], "ABCDEFGHIJKLMNOPQRSTUVWXYZ"],
            [options[1], "abcdefghijklmnopqrstuvwxyz"],
			[options[2], "0123456789"],
			[options[3], "!#$%&()*+,-./:;<=>?@[\\]_{|}"]
		];
		let password = "";

		for(let x = 0; x < length; x++) {
			let charset;
			do {
				// Pega um número aleatório entre 0 e 3 que são os índices de chars
				// O cálculo possui o índice maior como exclusivo, portanto deve-se adicionar +1 ao intervalo
				charset = chars[Math.floor(Math.random() * 4)];
			} 
			// Se o agrupamento de caracteres foi solicitado (localizado no primeiro índice) então da-se procedimento a inclusão dele na senha que será gerada
			while(!charset[0]);

			// Como o índice inicia em 0, o tamanho do array será sempre o último índice + 1
			// E como o calculo abaixo considera o MAX como exclusivo será retornado um índice dentro dos limites, sem que haja estouro
			let i = Math.floor(Math.random() * charset[1].length);
			password += charset[1].charAt(i);
		}

		return password;
	}

    strength(password) {
        let score = 0;
        if (!password)
            return score;

        // award every unique letter until 5 repetitions
        let letters = {};
        for (let i = 0; i<password.length; i++) {
            letters[password[i]] = (letters[password[i]] || 0) + 1;
            score += 5.0 / letters[password[i]];
        }

        // bonus points for mixing it up
        let variations = {
            digits: /\d/.test(password),
            lower: /[a-z]/.test(password),
            upper: /[A-Z]/.test(password),
            nonWords: /\W/.test(password),
        };

        let variationCount = 0;
        for (let check in variations) {
            variationCount += (variations[check] == true) ? 1 : 0;
        }
        score += (variationCount - 1) * 10;

        return parseInt(score);
    }
}

export default Password;
