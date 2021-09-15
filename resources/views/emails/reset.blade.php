<head>
	<style>
		body {
			background-color: #e1d7b9;
		}

		.password-Reset {
			width: 70%;
			margin: 0 auto;
		}

		h4 {
			margin-top: 100px;
			font-size: 25pt;
			text-align: left;
		}

		p {
			text-align: left;
			font-size: 10pt;
		}
	</style>
</head>
<body>
	<div class="password-Reset">
		<div class="password-Reset-Title">
			<h4>パスワードのリセットが要求されました。</h4>
		</div>
		<div class="password-Reset-Message">
			<p>24時間以内に下記のURLからパスワードのリセットを行なってください。</p>
			<p>{{ $actionUrl }}</p>
		</div>
	</div>
</body>