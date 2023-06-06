const apiKey = "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";
const url = "https://api.openai.com/v1/engines/davinci-codex/completions";

const requestOptions = {
  method: "POST",
  headers: {
    "Content-Type": "application/json",
    "Authorization": `Bearer ${apiKey}`
  },
  body: JSON.stringify({
    prompt: "Bonjour",
    max_tokens: 50
  })
};

fetch(url, requestOptions)
  .then(response => response.json())
  .then(result => console.log(result.choices[0].text))
  .catch(error => console.error("Erreur :", error));
