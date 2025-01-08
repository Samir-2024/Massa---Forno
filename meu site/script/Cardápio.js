function addToCart(id) {
    const produtoElement = document.getElementById(id).closest('.produto');
    
    if (produtoElement) {
        const imagem = produtoElement.querySelector("img").src;
        const nome = produtoElement.querySelector("h2").innerText;
        const precoTexto = produtoElement.querySelector("p").innerText;
        const quantidade = produtoElement.querySelector(".qtd").value;

        // Converter preço para número
        const preco = parseFloat(precoTexto.replace("R$", "").replace(",", ".").trim());

        if (isNaN(preco)) {
            alert("Erro ao adicionar o preço do produto. Verifique o formato do preço.");
            return;
        }

        // Criação do objeto do produto
        const produto = {
            id: id,
            imagem: imagem,
            nome: nome,
            preco: preco,
            quantidade: parseInt(quantidade, 10),
        };

        // Adicionar o produto ao carrinho (salvo no localStorage)
        let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
        const produtoExistente = carrinho.find(p => p.id === id);
        
        // Se o produto já existe no carrinho, apenas atualiza a quantidade
        if (produtoExistente) {
            produtoExistente.quantidade += produto.quantidade;
        } else {
            carrinho.push(produto);
        }

        localStorage.setItem('carrinho', JSON.stringify(carrinho));

        // Redirecionar para a página do carrinho
        window.location.href = 'carrinho.html';

    } else {
        alert("Erro ao encontrar o produto.");
    }
}

const updateQuantity = (input, increment) => {
    let currentValue = parseInt(input.value) || 0;
    currentValue += increment;

    // Limites de quantidade
    if (currentValue < 1) {
        currentValue = 1;
    } else if (currentValue > 99) {
        currentValue = 99;
    }
    input.value = currentValue;
};

document.addEventListener('DOMContentLoaded', () => {
    const minusButtons = document.querySelectorAll('.minus');
    const moreButtons = document.querySelectorAll('.more');

    minusButtons.forEach(button => {
        button.addEventListener('click', () => {
            const input = button.parentElement.querySelector('.qtd');
            updateQuantity(input, -1);
        });
    });

    moreButtons.forEach(button => {
        button.addEventListener('click', () => {
            const input = button.parentElement.querySelector('.qtd');
            updateQuantity(input, 1);
        });
    });

    const quantityInputs = document.querySelectorAll('.qtd');
    quantityInputs.forEach(input => {
        input.addEventListener('input', () => {
            let value = parseInt(input.value.replace(',', '.')) || 1;
            if (value < 1) value = 1;
            if (value > 99) value = 99;
            input.value = Math.round(value);
        });
    });

    const carrinhoContainer = document.getElementById('carrinho-tabela');
    const valorTotalElement = document.getElementById('valor-total');
    
    if (!carrinhoContainer || !valorTotalElement) {
        console.error("Elementos do carrinho não encontrados.");
        return;
    }

    let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];

    const atualizarCarrinho = () => {
        carrinhoContainer.innerHTML = '';
        let valorTotal = 0;

        // Criar a tabela com os produtos no carrinho
        carrinho.forEach((produto, index) => {
            const linha = document.createElement('tr');
            linha.innerHTML = `
                <td><img src="${produto.imagem}" alt="${produto.nome}" width="100"></td>
                <td>${produto.nome}</td>
                <td>R$ ${produto.preco.toFixed(2)}</td>
                <td>
                    <button onclick="alterarQuantidade(${index}, -1)">-</button>
                    ${produto.quantidade}
                    <button onclick="alterarQuantidade(${index}, 1)">+</button>
                </td>
                <td>R$ ${(produto.preco * produto.quantidade).toFixed(2)}</td>
                <td><button onclick="removerProduto(${index})">Remover</button></td>
            `;
            carrinhoContainer.appendChild(linha);
            valorTotal += produto.preco * produto.quantidade;
        });

        // Atualizar o valor total
        valorTotalElement.innerText = `Valor Total: R$ ${valorTotal.toFixed(2)}`;
    };

    atualizarCarrinho();

    window.alterarQuantidade = (index, delta) => {
        carrinho[index].quantidade += delta;
        if (carrinho[index].quantidade < 1) {
            carrinho[index].quantidade = 1;
        }
        localStorage.setItem('carrinho', JSON.stringify(carrinho));
        atualizarCarrinho();
    };

    window.removerProduto = (index) => {
        carrinho.splice(index, 1);
        localStorage.setItem('carrinho', JSON.stringify(carrinho));
        atualizarCarrinho();
    };
});
