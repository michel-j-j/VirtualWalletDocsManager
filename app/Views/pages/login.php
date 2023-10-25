<!DOCTYPE html>
<!-- saved from url=(0057)https://coreui.io/demos/bootstrap/5.0/light-v3/login.html -->
<html lang="es-419" data-coreui-theme="dark">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!--<base href="./">-->
	<base href=".">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<meta name="description" content="CoreUI - Bootstrap Admin Template">
	<meta name="author" content="Łukasz Holeczek">
	<meta name="keyword" content="Bootstrap,Admin,Template,SCSS,HTML,RWD,Dashboard">
	<title>CoreUI Bootstrap Admin Template</title>
	<link rel="apple-touch-icon" sizes="57x57" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/favicon-16x16.png">
	<link rel="manifest" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<!-- Vendors styles-->
	<link rel="stylesheet" href="CoreUI Bootstrap Admin Template_files/simplebar.css">
	<link rel="stylesheet" href="CoreUI Bootstrap Admin Template_files/simplebar(1).css">
	<!-- Main styles for this application-->
	<link href="CoreUI Bootstrap Admin Template_files/style.css" rel="stylesheet">
	<!-- We use those styles to show code examples, you should remove them in your application.-->
	<link href="CoreUI Bootstrap Admin Template_files/examples.css" rel="stylesheet">
	<script async="" src="CoreUI Bootstrap Admin Template_files/gtm.js.descarga"></script>
	<script src="CoreUI Bootstrap Admin Template_files/config.js.descarga"></script>
	<script src="CoreUI Bootstrap Admin Template_files/color-modes.js.descarga"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="assets/js/login.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-KX4JH47');
	</script>
	<!-- End Google Tag Manager-->
	<style type="text/css">
		@font-face {
			font-family: Roboto;
			src: url("chrome-extension://mcgbeeipkmelnpldkobichboakdfaeon/css/Roboto-Regular.ttf");
		}
	</style>
</head>

<body>
	<!-- Google Tag Manager (noscript)-->
	<noscript>
		<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KX4JH47" height="0" width="0" style="display:none;visibility:hidden"></iframe>
	</noscript>
	<!-- End Google Tag Manager (noscript)-->
	<div class="min-vh-100 d-flex flex-row align-items-center">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="card-group d-block d-md-flex row">
						<div class="card col-md-7 p-4 mb-0">
							<div class="card-body">
								<h1>Login</h1>
								<p class="text-body-secondary">Iniciar sesión en tu cuenta</p>
								<form id="formularioLogin" >

									<div class="input-group mb-3"><span class="input-group-text">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person icon" viewBox="0 0 16 16">
												<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
											</svg></span>
										<input class="form-control" type="email" placeholder="Email" name="email" required>
									</div>
									<div class="input-group mb-4"><span class="input-group-text">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-lock icon" viewBox="0 0 16 16">
												<path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z" />
												<path d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z" />
											</svg></span>
										<input class="form-control" type="password" placeholder="Contraseña" name="contra" required>
									</div>

									<div class="row">
										<div class="col-6">
											<button class="btn btn-primary px-4" type="submit">Iniciar Sesion</button>
								</form>
							</div>

							<div class="col-6 text-end">
								<button class="btn btn-link px-0" type="button">Te olvidaste tu contraseña?</button>
							</div>
						</div>
					</div>
				</div>
				<div class="card col-md-5 text-white bg-primary py-5">
					<div class="card-body text-center">
						<div>
							<h2>Registrarse</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							<button class="btn btn-lg btn-outline-light mt-3" type="button">Registrarse</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	<!-- CoreUI and necessary plugins-->
	<script src="CoreUI Bootstrap Admin Template_files/coreui.bundle.min.js.descarga"></script>
	<script src="CoreUI Bootstrap Admin Template_files/simplebar.min.js.descarga"></script>
	<script src="CoreUI Bootstrap Admin Template_files/i18next.min.js.descarga"></script>
	<script src="CoreUI Bootstrap Admin Template_files/i18nextHttpBackend.js.descarga"></script>
	<script src="CoreUI Bootstrap Admin Template_files/i18nextBrowserLanguageDetector.js.descarga"></script>
	<script src="CoreUI Bootstrap Admin Template_files/i18next.js.descarga"></script>
	<script>
		const header = document.querySelector('header.header');

		document.addEventListener('scroll', () => {
			if (header) {
				header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
			}
		});
	</script>
	<script>
	</script>


	<script>
		function returnCommentSymbol(language = "javascript") {
			const languageObject = {
				bat: "@REM",
				c: "//",
				csharp: "//",
				cpp: "//",
				closure: ";;",
				coffeescript: "#",
				dockercompose: "#",
				css: "/*DELIMITER*/",
				"cuda-cpp": "//",
				dart: "//",
				diff: "#",
				dockerfile: "#",
				fsharp: "//",
				"git-commit": "//",
				"git-rebase": "#",
				go: "//",
				groovy: "//",
				handlebars: "{{!--DELIMITER--}}",
				hlsl: "//",
				html: "<!--DELIMITER-->",
				ignore: "#",
				ini: ";",
				java: "//",
				javascript: "//",
				javascriptreact: "//",
				json: "//",
				jsonc: "//",
				julia: "#",
				latex: "%",
				less: "//",
				lua: "--",
				makefile: "#",
				markdown: "<!--DELIMITER-->",
				"objective-c": "//",
				"objective-cpp": "//",
				perl: "#",
				perl6: "#",
				php: "<!--DELIMITER-->",
				powershell: "#",
				properties: ";",
				jade: "//-",
				python: "#",
				r: "#",
				razor: "<!--DELIMITER-->",
				restructuredtext: "..",
				ruby: "#",
				rust: "//",
				scss: "//",
				shaderlab: "//",
				shellscript: "#",
				sql: "--",
				svg: "<!--DELIMITER-->",
				swift: "//",
				tex: "%",
				typescript: "//",
				typescriptreact: "//",
				vb: "'",
				xml: "<!--DELIMITER-->",
				xsl: "<!--DELIMITER-->",
				yaml: "#"
			}
			if (!languageObject[language]) {
				return languageObject["python"].split("DELIMITER")
			}
			return languageObject[language].split("DELIMITER")
		}
		var savedChPos = 0
		var returnedSuggestion = ''
		let editor, doc, cursor, line, pos
		pos = {
			line: 0,
			ch: 0
		}
		var suggestionsStatus = false
		var docLang = "python"
		var suggestionDisplayed = false
		var isReturningSuggestion = false
		document.addEventListener("keydown", (event) => {
			setTimeout(() => {
				editor = event.target.closest('.CodeMirror');
				if (editor) {
					const codeEditor = editor.CodeMirror
					if (!editor.classList.contains("added-tab-function")) {
						editor.classList.add("added-tab-function")
						codeEditor.removeKeyMap("Tab")
						codeEditor.setOption("extraKeys", {
							Tab: (cm) => {

								if (returnedSuggestion) {
									acceptTab(returnedSuggestion)
								} else {
									cm.execCommand("defaultTab")
								}
							}
						})
					}
					doc = editor.CodeMirror.getDoc()
					cursor = doc.getCursor()
					line = doc.getLine(cursor.line)
					pos = {
						line: cursor.line,
						ch: line.length
					}

					if (cursor.ch > 0) {
						savedChPos = cursor.ch
					}

					const fileLang = doc.getMode().name
					docLang = fileLang
					const commentSymbol = returnCommentSymbol(fileLang)
					if (event.key == "?") {
						var lastLine = line
						lastLine = lastLine.slice(0, savedChPos - 1)

						if (lastLine.trim().startsWith(commentSymbol[0])) {
							if (fileLang !== "null") {
								lastLine += " " + fileLang
							}

							lastLine = lastLine.split(commentSymbol[0])[1]
							window.postMessage({
								source: 'getQuery',
								payload: {
									data: lastLine
								}
							})
							isReturningSuggestion = true
							displayGrey("\nBlackbox loading...")
						}
					} else if (event.key === "Enter" && suggestionsStatus && !isReturningSuggestion) {
						var query = doc.getRange({
							line: Math.max(0, cursor.line - 50),
							ch: 0
						}, {
							line: cursor.line,
							ch: line.length
						})
						window.postMessage({
							source: 'getSuggestion',
							payload: {
								data: query,
								language: docLang,
								cursorPos: pos
							}
						})
						displayGrey("Blackbox loading...")
					} else if (event.key === "ArrowRight" && returnedSuggestion) {
						acceptTab(returnedSuggestion)
					} else if (event.key === "Enter" && isReturningSuggestion) {
						displayGrey("\nBlackbox loading...")
					} else if (event.key === "Escape") {
						displayGrey("")
					}
				}
			}, 0)
		})

		function acceptTab(text) {
			if (suggestionDisplayed) {
				displayGrey("")
				doc.replaceRange(text, pos)
				returnedSuggestion = ""
				updateSuggestionStatus(false)
			}
		}

		function acceptSuggestion(text) {
			displayGrey("")
			doc.replaceRange(text, pos)
			returnedSuggestion = ""
			updateSuggestionStatus(false)
		}

		function displayGrey(text) {
			if (!text) {
				document.querySelector(".blackbox-suggestion").remove()
				return
			}
			var el = document.querySelector(".blackbox-suggestion")
			if (!el) {
				el = document.createElement('span')
				el.classList.add("blackbox-suggestion")
				el.style = 'color:grey'
				el.innerText = text
			} else {
				el.innerText = text
			}

			var lineIndex = pos.line;
			editor.getElementsByClassName('CodeMirror-line')[lineIndex].appendChild(el)
		}

		function updateSuggestionStatus(s) {
			suggestionDisplayed = s
			window.postMessage({
				source: 'updateSuggestionStatus',
				status: suggestionDisplayed,
				suggestion: returnedSuggestion
			})
		}
		window.addEventListener('message', (event) => {
			if (event.source !== window) return
			if (event.data.source == 'return') {
				isReturningSuggestion = false
				const formattedCode = formatCode(event.data.payload.data)
				returnedSuggestion = formattedCode
				displayGrey(formattedCode)
				updateSuggestionStatus(true)
			}
			if (event.data.source == 'suggestReturn') {
				const prePos = event.data.payload.cursorPos
				if (pos.line == prePos.line && pos.ch == prePos.ch) {
					returnedSuggestion = event.data.payload.data
					displayGrey(event.data.payload.data)
					updateSuggestionStatus(true)
				} else {
					displayGrey()
				}
			}
			if (event.data.source == 'codeSearchReturn') {
				isReturningSuggestion = false
				displayGrey()
			}
			if (event.data.source == 'suggestionsStatus') {
				suggestionsStatus = event.data.payload.enabled
			}
			if (event.data.source == 'acceptSuggestion') {

				acceptSuggestion(event.data.suggestion)
			}
		})
		document.addEventListener("keyup", function() {
			returnedSuggestion = ""
			updateSuggestionStatus(false)
		})

		function formatCode(data) {
			if (Array.isArray(data)) {
				var finalCode = ""
				var pairs = []

				const commentSymbol = returnCommentSymbol(docLang)
				data.forEach((codeArr, idx) => {
					const code = codeArr[0]
					var desc = codeArr[1]
					const descArr = desc.split("\n")
					var finalDesc = ""
					descArr.forEach((descLine, idx) => {
						const whiteSpace = descLine.search(/\S/)
						if (commentSymbol.length < 2 || idx === 0) {
							finalDesc += insert(descLine, whiteSpace, commentSymbol[0])
						}
						if (commentSymbol.length > 1 && idx === descArr.length - 1) {
							finalDesc = finalDesc + commentSymbol[1] + "\n"
						}
					})

					finalCode += finalDesc + "\n\n" + code
					pairs.push(finalCode)
				})
				return "\n" + pairs.join("\n")
			}

			return "\n" + data
		}

		function insert(str, index, value) {
			return str.substr(0, index) + value + str.substr(index)
		}